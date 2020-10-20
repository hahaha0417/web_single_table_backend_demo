<?php
/*
{{-- 原始 : hahaha --}}
{{-- 維護 :  --}}
{{-- 指揮 :  --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{-- 
    ----------------------------------------------------------------------------
    說明 : 
    ----------------------------------------------------------------------------   
    
    ----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}
*/
namespace App\Http\Controllers\Backend\Table;

use hahaha\define\hahaha_define_table_action as action;
use hahaha\define\hahaha_define_table_class as class_;
use hahaha\define\hahaha_define_table_css as css;
use hahaha\define\hahaha_define_table_direction as direction;
use hahaha\define\hahaha_define_table_group as group;
use hahaha\define\hahaha_define_table_key as key;
use hahaha\define\hahaha_define_table_node as node;
use hahaha\define\hahaha_define_table_operator as op;
use hahaha\define\hahaha_define_table_tag as tag;
use hahaha\define\hahaha_define_table_type as type;
use hahaha\define\hahaha_define_table_use as use_;
use hahaha\define\hahaha_define_table_validate as validate;
use hahaha\define\hahaha_define_table_db_field_type as db_field_type;
use Spatie\Url\Url;

use App\Http\Controllers\Backend\Base\Table\IndexController as BaseIndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Models\Front\Index\Index_ as Index;
use App\Http\Models\Front\Index\Item;
use App\Http\Models\Front\Index\Temp;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use Redirect;
use EntityManager;
use Config;

// 如要資料庫切換 原則上有三種方式
// 1. 多個Controller，Include一份General的Code : Controller會很多個，不好
// 2. 將資料庫用一個函式統一動態生成(對應多個資料庫) : 這樣有心資料庫只需修改該函式 : 有點麻煩
// 3. 使用hahaha修改的Model_Ha，只需餵入資料庫名稱生成物件即可處理不同資料庫 : 多個資料庫動態生成時採用
class IndexController extends BaseIndexController
{
    public function index($stage, $class, $item)
    {  
        $input_ = request()->all();
        $page_ = request()->get('page');
        if(empty($page_))
        {
            $page_ = 1;
        }
        $size_ = Config::get("option.table.size");

        // 找到設定
        $setting_table_class_ = "\\hahaha\\$stage\\hahaha_setting_table";
        $setting_tables_ = $setting_table_class_::Instance();	
        // 取出設定檔	
        $routes_ = &$setting_tables_->Routes[$setting_tables_->Settings['default']['route']];
        $controllers_ = &$setting_tables_->Controllers[$setting_tables_->Settings['default']['controller']];
        $tables_ = &$setting_tables_->Tables[$setting_tables_->Settings['default']['table']];
        // 
        $system_setting_pub_ = \pub\hahaha_system_setting::Instance();
        $global_pub_ = \pub\hahaha_global::Instance();
        $project_ = $system_setting_pub_->Project->{$global_pub_->Node->Name};
 
        $target_setting_table = null;
        $url_token_ = explode("?", $_SERVER['REQUEST_URI']);
        foreach($tables_ as $key => &$table)
        {
            $url_ = "{$project_->Node}/table/{$stage}/{$table['node']}";
            
            if($url_ == $url_token_[0])
            {
                // 找到table setting檔
                $target_setting_table = &$table;
                break;

            }
        }
        
        if(empty($target_setting_table))
        {
            // 有空做成自己的error頁面
            return abort(404, 'Page not found');
        }

        // table物件
        $target_table = $target_setting_table['table']::Instance()
            ->Initial_Index();
            
        $target_repository_ = EntityManager::getRepository($target_setting_table['entity']);
        
        $data_list = [];
        
        $data_link = [];
        //dd($target_table);

        // -------------------------------------------------------------------- 
        // -------------------------------------------------------------------- 
        // Fields_Index DB用
        // Index 主區塊用
        // -------------------------------------------------------------------- 
        // -------------------------------------------------------------------- 

        // -------------------------------------------------------------------- 
        // Initial_Fields_Index屬二次附加的東西
        // 因為是架構基石，不做太多客製化設計，如要客製化(如['*'])，請再另外做一個通用組合模組
        // ex Initial_Fields(xxx::INDEX, key::FIELD_ALL);
        // 或者是 Inital_Page($parameter_, xxx::INDEX, key::FIELD_ALL)，初始化腳本
        // 這樣我其他頁也可以用，不需要強調這個小細節
        // -------------------------------------------------------------------- 
        // 注意 : 那兩個trait可能用一用，我可能要拆出來放到hahahalib，或者做成通用包，除非我確定要整入(php hahaha framework or p"h"p framework 的single table)，不然先分開
        // 注意 : 基本上用這個套版的不會沒事動到我這塊，有也只是插入一些小的函式片段(未來可能挖空，其實這可以自己加。共用模組不會超過5 ~ 10個，繼承出簡易替換也行)，不要影響到我移植的方便性
        // 注意 : 只要架構裡，我是全部用原生php寫的class，可能會移植給 php hahaha framework or p"h"p framework 的single table 直接使用，不要亂改我接口
        // --------------------------------------------------------------------        
        if(1)
        {
            $fields = &$target_table->Initial_Fields_Index()->Fields_Index;    
        }
        else 
        {
            // 填$fields = [*];，不用Initial_Fields_Index
            $fields = ['*'];    
        }
        $filters = [];
        // -------------------------------------------------------------------- 
        $result_ = $target_repository_->findByPagination($data_list, 
            $data_link,
            $target_setting_table, 
            $fields,  
            $filters,  
            $page_, 
            $size_
        );

        // 如資料連結有額外需求，在得到後進行二次轉換
        // $data_link = convert($data_link);
        
        if(!$result_)
        {
            // 有空做成自己的error頁面
            return abort(404, 'findByPagination error');
        }

        $target_table_identify = implode('_', explode('/', $target_setting_table['stage']) ) . '_' . implode('_', explode('/', $target_setting_table['node']));
      
        // 因為generator要用，這裡準備參數
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        // 輸入
        $parameter_->Input = new \hahaha\hahaha_parameter;
        // 輸出
        $parameter_->Output = new \hahaha\hahaha_parameter;
        // 暫記參數
        $parameter_->Extra = new \hahaha\hahaha_parameter;
        // 使用的資料
        $parameter_->Use = new \hahaha\hahaha_parameter;
        // property
        $parameter_->Target_Setting_Table = &$target_setting_table;
        $parameter_->Target_Table_Identify = &$target_table_identify;
        $parameter_->Target_Table = &$target_table;
        $parameter_->Index = [
            key::DATA_LIST => &$data_list,
            key::DATA_LINK => &$data_link,
        ];
        //

        //

        return view('web.backend.table.index');    
    }


    public function create()
    {
        // 如有必要，再建此頁
        // $id = date('Y-m-d_H-i-s').'_'.mt_rand(1000,9999);
        // $result = Temp::where(['id'=>$id]);    

        // while($result->count()){            
        //     $id = date('Y-m-d_H-i-s').'_'.mt_rand(1000,9999);
        //     $result = Temp::where(['id'=>$id]);
        // }
        // // new id
        // Temp::create(['id' => $id, 'stage' => 'index', 'action' => 'create']);

        // return view('web.backend.index.edit', compact('page', 'item', 'id'));  
    }


    public function store()
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($stage, $class, $item, $id)
    {       
        $input_ = request()->all();

        // 找到設定
        $setting_table_class_ = "\\hahaha\\$stage\\hahaha_setting_table";
        $setting_tables_ = $setting_table_class_::Instance();	
        // 取出設定檔	
        $routes_ = &$setting_tables_->Routes[$setting_tables_->Settings['default']['route']];
        $controllers_ = &$setting_tables_->Controllers[$setting_tables_->Settings['default']['controller']];
        $tables_ = &$setting_tables_->Tables[$setting_tables_->Settings['default']['table']];
        // 
        $system_setting_pub_ = \pub\hahaha_system_setting::Instance();
        $global_pub_ = \pub\hahaha_global::Instance();
        $project_ = $system_setting_pub_->Project->{$global_pub_->Node->Name};
 
        $target_setting_table = null;
        $url_token_ = explode("?", $_SERVER['REQUEST_URI']);
        foreach($tables_ as $key => &$table)
        {
            $url_ = "{$project_->Node}/table/{$stage}/{$table['node']}/edit/{$id}";
            
            if($url_ == $url_token_[0])
            {
                // 找到table setting檔
                $target_setting_table = &$table;
                break;

            }
        }
        
        if(empty($target_setting_table))
        { 
            // 有空做成自己的error頁面
            return abort(404, 'Page not found');
        }

        // table物件
        $target_table = $target_setting_table['table']::Instance()
            ->Initial_Edit();
            
        $target_repository_ = EntityManager::getRepository($target_setting_table['entity']);
        
        $data_list = [];
        
        $data_link = [];
        //dd($target_table);

        // -------------------------------------------------------------------- 
        // -------------------------------------------------------------------- 
        // Fields_Edit DB用
        // Edit 主區塊用
        // -------------------------------------------------------------------- 
        // -------------------------------------------------------------------- 

        // -------------------------------------------------------------------- 
        // Initial_Fields_Index屬二次附加的東西
        // 因為是架構基石，不做太多客製化設計，如要客製化(如['*'])，請再另外做一個通用組合模組
        // ex Initial_Fields(xxx::INDEX, key::FIELD_ALL);
        // 或者是 Inital_Page($parameter_, xxx::INDEX, key::FIELD_ALL)，初始化腳本
        // 這樣我其他頁也可以用，不需要強調這個小細節
        // -------------------------------------------------------------------- 
        // 注意 : 那兩個trait可能用一用，我可能要拆出來放到hahahalib，或者做成通用包，除非我確定要整入(php hahaha framework or p"h"p framework 的single table)，不然先分開
        // 注意 : 基本上用這個套版的不會沒事動到我這塊，有也只是插入一些小的函式片段(未來可能挖空，其實這可以自己加。共用模組不會超過5 ~ 10個，繼承出簡易替換也行)，不要影響到我移植的方便性
        // 注意 : 只要架構裡，我是全部用原生php寫的class，可能會移植給 php hahaha framework or p"h"p framework 的single table 直接使用，不要亂改我接口
        // --------------------------------------------------------------------        
        if(0)
        {
            $fields = &$target_table->Initial_Fields_Edit()->Fields_Edit;    
        }
        else 
        {
            // 填$fields = [*];，不用Initial_Fields_Index
            $fields = ['*'];    
        }
        // --------------------------------------------------------------------     
        $filters = [
            key::NONE => ["id", "=", $id],     
        ];
        $result_ = $target_repository_->findByFields($data_list, 
            $target_setting_table, 
            $fields,
            $filters
        ); 

        // 如資料連結有額外需求，在得到後進行二次轉換
        // $data_link = convert($data_link);
        
        if(!$result_)
        {
            // 有空做成自己的error頁面
            return abort(404, 'findByPagination error');
        }

        if(empty($data_list) )
        {
            // 有空做成自己的error頁面
            return abort(404, 'No data error');
        }

        if(count($data_list) != 1)
        {
            // 有空做成自己的error頁面
            return abort(404, 'Data not one error');
        }
        // 這樣是一筆
        $data = &$data_list[0];

        $target_table_identify = implode('_', explode('/', $target_setting_table['stage']) ) . '_' . implode('_', explode('/', $target_setting_table['node']));
      

        // 因為generator要用，這裡準備參數
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        // 輸入
        $parameter_->Input = new \hahaha\hahaha_parameter;
        // 輸出
        $parameter_->Output = new \hahaha\hahaha_parameter;
        // 暫記參數
        $parameter_->Extra = new \hahaha\hahaha_parameter;
        // 使用的資料
        $parameter_->Use = new \hahaha\hahaha_parameter;
        // property
        $parameter_->Target_Setting_Table = &$target_setting_table;
        $parameter_->Target_Table_Identify = &$target_table_identify;
        $parameter_->Target_Table = &$target_table;
        $parameter_->Edit = [
            key::DATA => $data,
        ];
        //

        return view('web.backend.table.edit'); 

    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        $item = Index::where(['id'=>$id])->first();
        
        $dir = "";

        $item_page_dir = "";
        $item_item_dir = "";
        {
            //             
            if($item['page'] != null && $item['item'] != null){
                $dir .= "index/".$item['page']."/".$item['item']."/";
                $item_page_dir = "index/".$item['page']."/";
                $item_item_dir = "index/".$item['page']."/".$item['item']."/";
            }            
            else if($item['page'] != null && $item['item'] == null){
                $dir .= "page/".$item['page']."/";
                $item_page_dir = "page/".$item['page']."/";                
            }
            else if($item['page'] == null && $item['item'] != null){
                $dir .= "item/".$item['item']."/";
                $item_item_dir = "item/".$item['item']."/";
            }
            else if($item['page'] == null && $item['item'] == null){
                $dir .= "none/";
            }
            $dir .= $item['id']."/";            
        }
                     
        $item_dir = '/upload/front/index/'.$dir;
        $delete = true;  
                
        {   
            if(File::isDirectory(base_path().'/public/upload/front/index/'.$dir)){                
                // 清掉原有資料夾(id)
                File::deleteDirectory(base_path().'/public/upload/front/index/'.$dir);
                // 上兩層路徑是否為空
                if($item_page_dir != "" && $item_item_dir != ""){
                    $files_item = File::allFiles(base_path().'/public/upload/front/index/'.$item_item_dir);
                    if(count($files_item) == 0){                    
                        rmdir(base_path().'/public/upload/front/index/'.$item_item_dir);
                        $files_page = File::allFiles(base_path().'/public/upload/front/index/'.$item_page_dir);
                        if(count($files_page) == 0){
                            rmdir(base_path().'/public/upload/front/index/'.$item_page_dir);                        
                        }
                        else if(count($files_page) == 1){
                            // 似乎是刪不掉

                            // 由於刪除後可能檔案系統有紀錄，所以不一定等於0，要另外做處理                                
                            // if(!$files_page[0]->isDir() && !$files_page[0]->isFile()){
                            //     rmdir(base_path().'/public/upload/front/index/'.$item_page_temp_dir); 
                            // }
                        }
                    }
                }
                else if($item_page_dir != "" && $item_item_dir == ""){
                    $files_page = File::allFiles(base_path().'/public/upload/front/index/'.$item_page_dir);
                    if(count($files_page) == 0){
                        rmdir(base_path().'/public/upload/front/index/'.$item_page_dir);                        
                    }                    
                }
                else if($item_page_dir == "" && $item_item_dir != ""){
                    $files_item = File::allFiles(base_path().'/public/upload/front/index/'.$item_item_dir);
                    if(count($files_item) == 0){
                        rmdir(base_path().'/public/upload/front/index/'.$item_item_dir);                    
                    }
                }
                else if($item_page_dir == "" && $item_item_dir == ""){

                }      
            }      
       
            // $delete &= Item::where(["id"=>$id])->delete();  
            $delete &= Index::where(["id"=>$id])->delete();            
                   
        }

        

        $result;
        if($delete){
            $result = [
                'status' => 0,
                'msg' => '刪除成功!',
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '刪除失敗',
            ];
        }
        return $result;
    }

    public function deal()
    {
        $input = Input::except('_token','_method');
        $deal = $input["deal"];
        $method = $input['method'];
        if($deal == 'item'){
            $result = $this->item($input);
        }
        else if($deal == 'item_item'){
            $result = $this->item_item($input);
        }
        else if($deal == 'operate'){
            // 跨id處理資料
            // $result = $this->operate($input);
        }
        //
        else if($deal == '' && $method == 'all_update'){
            $item = $input["item"];
            $item_item = $input["item_item"];
            $result = $this->all_update($item, $item_item);
        }

        return $result;
    }
    // -------------------------------------------------------------------------------------
    public function all_update($item, $item_item)
    { 

    }
    // -------------------------------------------------------------------------------------
    // item 動作
    public function item($input)
    { 
        $method = $input['method'];
        $item = $input["item"];
        $result;
        // dd($item);
        
        if($method == "add"){
            $result = $this->item_add($item);
        }
        else if($method == "add_index"){
            $result = $this->item_add_index($item);
        }
        else if($method == "add_nav"){
            $result = $this->item_add_nav($item);
        }
        else if($method == "select_delete"){
            $id = $input["id"];
            $result = $this->item_select_delete($id);
        }
        else if($method == "update"){
            $id = $input["id"];
            $result = $this->item_update($id, $item);
        }
        else if($method == "all_save"){            
            $result = $this->item_all_save($item);
        }
        else if($method == "order"){
            $id = $input["id"];
            $result = $this->item_order($id, $item);
        }
        else if($method == "page_item_id_update"){
            $id = $input["id"];
            $result = $this->item_page_item_id_update($id, $item);
        }
        else if($method == "image_refresh"){
            $id = $input["id"];
            $target = $input["target"];
            $result = $this->item_image_refresh($target, $id, $item);
        }
        else if($method == "upload"){
            $target = $input["target"];
            $result = $this->item_upload($target, $item);
        }
        else if($method == "check_id"){
            $id = $input["id"];
            $result = $this->item_check_id($id);
        }

        return $result;
    }    

    public function item_add($item)
    {
        $find = Index::where(["id"=>$item["id"]])->first();
        
        $input = Input::except('_token','_method');
        $item_id = null;
        $ok = null;
        if(!$find)
        {            
            if(!$find){
                $ok = Index::create($item);
                $item_id = Index::where(["id"=>$item["id"]])->first();
            }
            else{                
                // 重複
            }

            // try {
            // $ok = Index::create($item);
            // } catch (QueryException $e) {
            //     dd($e);
            //     return;
            // }
        }
        
        if($ok){
            $result = [
                'status' => 0,
                'msg' => '建立成功!',
                'item' => $item_id,                
            ];
        }
        else{   
            if($find)
            {
                $result = [
                    'status' => 1,
                    'msg' => 'ID重複，請更改ID!',
                ];
            }         
            else
            {
                if($find_id)
                {
                    $result = [
                        'status' => 1,
                        'msg' => '建立失敗',
                    ];
                }                
            }    
        }
        return $result;
    }

    public function item_add_index($item)
    {
        $find = Index::where(["page"=>$item["page"],"item"=>$item["item"],"title_name"=>$item["title_name"]])->first();
        
        $input = Input::except('_token','_method');
        $item_id = null;
        $ok = null;
        
        if(!$find)
        {
            // 檢查ID是否重複
            $find_id = Index::where(["id"=>$item["id"]])->first();
            
            if(!$find_id){
                $ok = Index::create($item);                
                $item_id = Index::where(["id"=>$item["id"]])->first();
            }
            else{                
                // 重複
            }
            // try {
            // $ok = Index::create($item);
            // } catch (QueryException $e) {
            //     dd($e);
            //     return;
            // }
        }
        
        if($ok){
            $result = [
                'status' => 0,
                'msg' => '建立成功!',
                'item' => $item_id,
            ];
        }
        else{   
            if($find)
            {
                $result = [
                    'status' => 1,
                    'msg' => 'Title Name重複，請更改標題!',
                ];
            }         
            else
            {
                if($find_id)
                {
                    $result = [
                        'status' => 1,
                        'msg' => 'ID重複，請更改標題!',
                    ];
                }                
            }    
        }
        return $result;
    }

    public function item_add_nav($item)
    {
        $find = Index::where(["page"=>$item["page"],"item"=>$item["item"],"title_name"=>$item["title_name"]])->first();
        
        $input = Input::except('_token','_method');
        $item_id = null;
        $ok = null;
        
        if(!$find)
        {
            // 檢查ID是否重複
            $find_id = Index::where(["id"=>$item["id"]])->first();
            
            if(!$find_id){
                $ok = Index::create($item);                
                $item_id = Index::where(["id"=>$item["id"]])->first();
            }
            else{                
                // 重複
            }
            // try {
            // $ok = Index::create($item);
            // } catch (QueryException $e) {
            //     dd($e);
            //     return;
            // }
        }
        
        if($ok){
            $result = [
                'status' => 0,
                'msg' => '建立成功!',
                'item' => $item_id,
            ];
        }
        else{   
            if($find)
            {
                $result = [
                    'status' => 1,
                    'msg' => 'Title Name重複，請更改標題!',
                ];
            }         
            else
            {
                if($find_id)
                {
                    $result = [
                        'status' => 1,
                        'msg' => 'ID重複，請更改標題!',
                    ];
                }                
            }    
        }
        return $result;
    }

    public function item_select_delete($id){
        $delete = true;
        for($i = 0; $i < count($id); $i++){

            $item = Index::where(['id'=>$id[$i]])->first();
        
            $dir = "";

            $item_page_dir = "";
            $item_item_dir = "";
            {
                //             
                if($item['page'] != null && $item['item'] != null){
                    $dir .= "index/".$item['page']."/".$item['item']."/";
                    $item_page_dir = "index/".$item['page']."/";
                    $item_item_dir = "index/".$item['page']."/".$item['item']."/";
                }            
                else if($item['page'] != null && $item['item'] == null){
                    $dir .= "page/".$item['page']."/";
                    $item_page_dir = "page/".$item['page']."/";                
                }
                else if($item['page'] == null && $item['item'] != null){
                    $dir .= "item/".$item['item']."/";
                    $item_item_dir = "item/".$item['item']."/";
                }
                else if($item['page'] == null && $item['item'] == null){
                    $dir .= "none/";
                }
                $dir .= $item['id']."/";            
            }
                        
            $item_dir = '/upload/front/index/'.$dir;
            $delete;        
            {   
                if(File::isDirectory(base_path().'/public/upload/front/index/'.$dir)){                
                    // 清掉原有資料夾(id)
                    File::deleteDirectory(base_path().'/public/upload/front/index/'.$dir);
                    // 上兩層路徑是否為空
                    if($item_page_dir != "" && $item_item_dir != ""){
                        $files_item = File::allFiles(base_path().'/public/upload/front/index/'.$item_item_dir);
                        if(count($files_item) == 0){                    
                            rmdir(base_path().'/public/upload/front/index/'.$item_item_dir);
                            $files_page = File::allFiles(base_path().'/public/upload/front/index/'.$item_page_dir);
                            if(count($files_page) == 0){
                                rmdir(base_path().'/public/upload/front/index/'.$item_page_dir);                        
                            }
                            else if(count($files_page) == 1){
                                // 似乎是刪不掉

                                // 由於刪除後可能檔案系統有紀錄，所以不一定等於0，要另外做處理                                
                                // if(!$files_page[0]->isDir() && !$files_page[0]->isFile()){
                                //     rmdir(base_path().'/public/upload/front/index/'.$item_page_temp_dir); 
                                // }
                            }
                        }
                    }
                    else if($item_page_dir != "" && $item_item_dir == ""){
                        $files_page = File::allFiles(base_path().'/public/upload/front/index/'.$item_page_dir);
                        if(count($files_page) == 0){
                            rmdir(base_path().'/public/upload/front/index/'.$item_page_dir);                        
                        }
                    }
                    else if($item_page_dir == "" && $item_item_dir != ""){
                        $files_item = File::allFiles(base_path().'/public/upload/front/index/'.$item_item_dir);
                        if(count($files_item) == 0){
                            rmdir(base_path().'/public/upload/front/index/'.$item_item_dir);                    
                        }
                    }
                    else if($item_page_dir == "" && $item_item_dir == ""){

                    }      
                }     
            }
            // dd(Item::where(["id"=>$id[$i]])->get());
            $delete &= Index::where(['id'=>$id[$i]])->delete();
            if(Item::where(["id"=>$id[$i]])->count() != 0){
                $delete &= Item::where(["id"=>$id[$i]])->delete();  
            }            
        }
        if($delete){
            $result = [
                'status' => 0,
                'msg' => '刪除成功!',
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '刪除失敗',
            ];
        }
        return $result;
    }

    public function item_update($id, $item){
        $update = null;
        $update = Index::where(['id' => $id])->update($item);
       
        if($update){
            $result = [
                'status' => 0,
                'msg' => '更新成功!',
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '更新失敗',
            ];
        }
        return $result;
    }

    public function item_all_save($item){
        $delete = true;
        for($i = 1; $i <= count($item); $i++){
            $delete &= Index::where(['id'=>$item[$i]["id"]])->update($item[$i]);            
        }
        if($delete){
            $result = [
                'status' => 0,
                'msg' => '儲存成功!',
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '儲存失敗',
            ];
        }
        return $result;
    }

    public function item_order($id, $item)
    {
        $update = Index::where(["id"=>$id])->update(["order_"=>$item["order_"]]);
         
        // dd($update);
        // return;
        if($update){
            $result = [
                'status' => 0,
                'msg' =>  '排序更新成功!',
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '排序更新失敗',
            ];
        }
        
        return $result;          
    }

    public function item_page_item_id_update($id, $item)
    {
        if(!empty($item['id']) && $item['id'] == ''){
            return $result = [
                'status' => 1,
                'msg' => '更新失敗',
            ];
        }
        if(!empty($item['id'])){
            $find = Index::where(["id"=>$item['id']])->first();
            if($find){
                return $result = [
                    'status' => 1,
                    'msg' => '更新失敗',
                ];
            }
        }

        $item_temp = Index::where(["id"=>$id])->first();
        $dir_temp = "";
        $dir = "";
        
        $item_page_temp_dir = "";
        $item_item_temp_dir = "";
        {
            //             
            if($item_temp['page'] != null && $item_temp['item'] != null){
                $dir_temp .= "index/".$item_temp['page']."/".$item_temp['item']."/";
                $item_page_temp_dir = "index/".$item_temp['page']."/";
                $item_item_temp_dir = "index/".$item_temp['page']."/".$item_temp['item']."/";
            }            
            else if($item_temp['page'] != null && $item_temp['item'] == null){
                $dir_temp .= "page/".$item_temp['page']."/";
                $item_page_temp_dir = "page/".$item_temp['page']."/";                
            }
            else if($item_temp['page'] == null && $item_temp['item'] != null){
                $dir_temp .= "item/".$item_temp['item']."/";
                $item_item_temp_dir = "item/".$item_temp['item']."/";
            }
            else if($item_temp['page'] == null && $item_temp['item'] == null){
                $dir_temp .= "none/";
            }
            $dir_temp .= $item_temp['id']."/";            
        }

        {
            if(!empty($item['page'])){
                if($dir == "" && $item['page'] != null){
                    $dir .= "index/".$item['page']."/";
                }            
                else if($dir == "" && $item['page'] == null){
                    $dir .= "page/".$item['page']."/";
                }
            }
            else{
                if($dir == "" && $item_temp['page'] != null){
                    $dir .= "index/".$item_temp['page']."/";
                }            
                else if($dir == "" && $item_temp['page'] == null){
                    $dir .= "page/".$item_temp['page']."/";
                }
            }

            if(!empty($item['item'])){
                if($dir != "" && $item['item'] != null){
                    $dir .= $item['item']."/";
                }            
                else if($dir != "" && $item['item'] == null){
                    
                }
                else if($dir == "" && $item['item'] != null){
                    $dir .= "item/".$item['item']."/";
                }            
                else if($dir == "" && $item['item'] == null){
                    $dir .= "none/";
                }
            }
            else{
                if($dir != "" && $item_temp['item'] != null){
                    $dir .= $item_temp['item']."/";
                }            
                else if($dir != "" && $item_temp['item'] == null){
                    
                }
                else if($dir == "" && $item_temp['item'] != null){
                    $dir .= "item/".$item_temp['item']."/";
                }            
                else if($dir == "" && $item_temp['item'] == null){
                    $dir .= "none/";
                }
            }

            if(!empty($item['id'])){
                $dir .= $item['id']."/";
            }
            else{
                $dir .= $item_temp['id']."/";
            }                      
        }
           
        $update = true;

        // https://laravel.com/docs/5.6/facades
        // http://php.net/manual/zh/ref.filesystem.php            
        $image_temp_dir = File::dirname($item_temp["image"])."/";
        $image_temp_file_name = File::basename($item_temp["image"]);

        $title_image_temp_dir = File::dirname($item_temp["title_image"])."/";
        $title_image_temp_file_name = File::basename($item_temp["title_image"]);
        
        $item_temp_dir = '/upload/front/index/'.$dir_temp;
        $item_dir = '/upload/front/index/'.$dir;
        
        if($item_temp_dir == $item_dir){
            // 圖片路徑沒有更動
        }
        else{            
            // 路徑更動
            if(!File::isDirectory(base_path().'/public/upload/front/index/'.$dir)){
                File::makeDirectory(base_path().'/public/upload/front/index/'.$dir, 0775, true);
            }   
            
            File::moveDirectory(base_path().'/public/upload/front/index/'.$dir_temp, base_path().'/public/upload/front/index/'.$dir, true);
            
            if($item_page_temp_dir != "" && $item_item_temp_dir != ""){
                if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_item_temp_dir)){    
                    $files_item = File::allFiles(base_path().'/public/upload/front/index/'.$item_item_temp_dir);
                   
                    if(count($files_item) == 0){   
                        rmdir(base_path().'/public/upload/front/index/'.$item_item_temp_dir);
                        
                        if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_page_temp_dir)){  
                            $files_page = File::allFiles(base_path().'/public/upload/front/index/'.$item_page_temp_dir);
                                                                
                            if(count($files_page) == 0){
                                rmdir(base_path().'/public/upload/front/index/'.$item_page_temp_dir); 
                            }
                            else if(count($files_page) == 1){
                                // 似乎是刪不掉

                                // 由於刪除後可能檔案系統有紀錄，所以不一定等於0，要另外做處理                                
                                // if(!$files_page[0]->isDir() && !$files_page[0]->isFile()){
                                //     rmdir(base_path().'/public/upload/front/index/'.$item_page_temp_dir); 
                                // }
                            }
                        }                       
                    }
                }
                
                
            }
            else if($item_page_temp_dir != "" && $item_item_temp_dir == ""){
                if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_item_temp_dir)){  
                    $files_page = File::allFiles(base_path().'/public/upload/front/index/'.$item_page_temp_dir);
                
                    if(count($files_page) == 0){
                        rmdir(base_path().'/public/upload/front/index/'.$item_item_temp_dir);                  
                    }
                }
            }
            else if($item_page_temp_dir == "" && $item_item_temp_dir != ""){
                if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_item_temp_dir)){  
                    $files_item = File::allFiles(base_path().'/public/upload/front/index/'.$item_item_temp_dir);
                
                    if(count($files_item) == 0){
                        rmdir(base_path().'/public/upload/front/index/'.$item_item_temp_dir); 
                    }
                }
            }
            else if($item_page_temp_dir == "" && $item_item_temp_dir == ""){

            }      
            
            if($image_temp_dir == $item_temp_dir){
                $item_temp["image"] = $item_dir.$image_temp_file_name;
            }
            if($title_image_temp_dir == $item_temp_dir){
                $item_temp["title_image"] = $item_dir.$title_image_temp_file_name;
            }
            if(!empty($item['page'])){
                $item_temp['page'] = $item['page'];
            }
            if(!empty($item['item'])){
                $item_temp['item'] = $item['item'];
            }
            if(!empty($item['id'])){
                $item_temp['id'] = $item['id'];
            }

            
            
            $item_item_temp = Item::where(["id"=>$id])->get();
            
            for($i = 0; $i < count($item_item_temp); $i++){
                $modify = false;
                $item_item_image = $item_item_temp[$i]['image'];
                $item_item_image_temp_dir = File::dirname($item_item_temp[$i]['image'])."/";
                $item_item_image_temp_file_name = File::basename($item_item_temp[$i]['image']);
                  
                if($item_item_image_temp_dir == '/upload/front/index/'.$dir_temp.$item_item_temp[$i]['no'].'/' &&
                $item_item_temp[$i]['image'] != $item_dir.$item_item_temp[$i]['no'].'/'.$item_item_image_temp_file_name){                    
                    $item_item_temp[$i]['image'] = $item_dir.$item_item_temp[$i]['no'].'/'.$item_item_image_temp_file_name;
                    
                    $modify = true;
                }
                if(!empty($item['id']) && $item_item_temp[$i]['id'] != $item['id']){
                    $item_item_temp[$i]['id'] = $item['id'];
                    $modify = true;
                }      
                if($modify == true){
                    $update &= Item::where(["id"=>$id, "no"=>$item_item_temp[$i]['no']])->update($item_item_temp[$i]->toArray());
                }      
            }
            $update &= Index::where(["id"=>$id])->update($item_temp->toArray());
        }

        if($update){
            $result = [
                'status' => 0,
                'msg' =>  '更新成功!',
                'item' => $item_temp,
                'item_item' => $item_item_temp,
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '更新失敗',
            ];
        }
        return $result;
    }

    public function item_image_refresh($target, $id, $item)
    {
        $item_target = Index::where(['id'=>$id])->first();
        $old_dir;
        $old_file_name;
        
        $dir = "";
        if($item_target['page'] != null && $item_target['item'] != null){
            $dir .= "index/".$item_target['page']."/".$item_target['item']."/";
        }            
        else if($item_target['page'] != null && $item_target['item'] == null){
            $dir .= "page/".$item_target['page']."/";
        }
        else if($item_target['page'] == null && $item_target['item'] != null){
            $dir .= "item/".$item_target['item']."/";
        }
        else if($item_target['page'] == null && $item_target['item'] == null){
            $dir .= "none/";
        }

        if($target == "image"){
            $dir .= $item_target['id']."/";
        }
        else if($target == "title_image"){
            $dir .= $item_target['id']."/title/";
        }

        $new_dir = File::dirname($item[$target])."/";
        $new_file_name = File::basename($item[$target]);

        $old_dir = File::dirname($item_target[$target])."/";
        $old_file_name = File::basename($item_target[$target]);

        if($old_dir == '/upload/front/index/'.$dir && $old_dir.$old_file_name != $new_dir.$new_file_name){
            // 本身目錄
            File::delete(base_path()."/public".$old_dir.$old_file_name);
            $files = File::allFiles(base_path()."/public".$old_dir);
            if(count($files) == 0){
                rmdir(base_path()."/public".$old_dir);                        
            }
        }

        $refresh = Index::where(["id"=>$id])->update([$target=>$item[$target]]);
        // dd($update);
        // return;
        if($refresh){
            $result = [
                'status' => 0,
                'msg' =>  '刷新成功!',
                'thumbnail' => $item[$target],
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '刷新失敗',
            ];
        }
        return $result;
    }

    


    //
    //图片上传
    public function item_upload($target, $item)
    {
        $file = Input::file('index_file');
        // dd($item);
        // return;
        $update;
        $filepath;
        if($file -> isValid()){
            //dd($file);
            $realPath = $file -> getRealPath();//临时文件的绝对路径
            $entension = $file -> getClientOriginalExtension();//上传文件的后缀
            // http://learningbyrecording.blogspot.tw/2015/01/php.html
            $name_origin = basename($file->getClientOriginalName(),'.'.$entension).'.'.$entension;
            $dir = "";
            if($item['page'] != null && $item['item'] != null){
                $dir .= "index/".$item['page']."/".$item['item']."/";
            }            
            else if($item['page'] != null && $item['item'] == null){
                $dir .= "page/".$item['page']."/";
            }
            else if($item['page'] == null && $item['item'] != null){
                $dir .= "item/".$item['item']."/";
            }
            else if($item['page'] == null && $item['item'] == null){
                $dir .= "none/";
            }

            if($target == "image"){
                $dir .= $item['id']."/";
            }
            else if($target == "title_image"){
                $dir .= $item['id']."/title/";
            }

            $item_target = Index::where(['id'=>$item['id']])->first();
            $old_dir;
            $old_file_name;

            if($target == "image"){
                $old_dir = File::dirname($item_target["image"])."/";
                $old_file_name = File::basename($item_target["image"]);
            }
            else if($target == "title_image"){
                $old_dir = File::dirname($item_target["title_image"])."/";
                $old_file_name = File::basename($item_target["title_image"]);
            }
            if($old_dir == '/upload/front/index/'.$dir){  
                // echo base_path()."/public".$old_dir.$old_file_name;
                // return ;     
                File::delete(base_path()."/public".$old_dir.$old_file_name);                
            }

            $path = $file->move(base_path().'/public/upload/front/index/'.$dir, $name_origin);
            $filepath = '/upload/front/index/'.$dir.$name_origin;
            
            $update = Index::where(['id'=>$item['id']])->update([$target => $filepath]);              
        }     
        // echo $update;
        // return;
        if($update){
            $result = [
                'status' => 0,
                'msg' =>  '更新成功!',
                'image' => $filepath,
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '更新失敗',
            ];
        }
        return $result;
        // // http://blog.wentech.info/2014/08/jquery.html
        // // http://www.muyesanren.com/2017/04/24/laravel-use-ajax-to-upload-file/   // *
        // // http://www.codovel.com/ajax-image-upload-with-laravel-example.html
        // // http://hayageek.com/docs/jquery-upload-file.php

        // // 這會存到uploads/avatars
        // // if ($request->ajax()) {
        // //     $file = $request->file('myfile');
        // //     // 第一个参数代表目录, 第二个参数代表我上方自己定义的一个存储媒介
        // //    // dd($file);
        // //     $path = $file->store('avatars', 'uploads');
        // //     return response()->json(array('msg' => $path));
        // // }
        
    }

    public function item_check_id($id)
    {
        $id_list = Index::where(["id"=>$id]);
         
        // dd($result);
        // return;
        if($id_list->count() == 0){
            $result = [
                'status' => 0,
                'msg' =>  'ID可以使用',
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => 'ID已經存在',
            ];
        }
        
        return $result;          
    }

    // -------------------------------------------------------------------------------------
    public function item_item($input)
    {  
        $method = $input['method'];
        $item = $input["item"];
        $item_item = $input["item_item"];
        $result;

        if($method == "items"){    
            // 查詢項目        
            $id = $input["id"];
            $result = $this->item_item_items($id);
        }
        else if($method == "all_update"){
            $result = $this->item_item_all_update($id, $item_item);
        }
        //        
        else if($method == "add"){            
            $id = $input["id"];
            $result = $this->item_item_add($id);
        }
        else if($method == "delete"){
            $id = $input["id"];
            $no = $input["no"];
            $result = $this->item_item_delete($id, $no);
        }
        else if($method == "update"){
            $id = $input["id"];
            $no = $input["no"];
            $result = $this->item_item_update($id, $no, $item_item);
        }
        //
        else if($method == "upload"){
            $target = $input["target"];
            $result = $this->item_item_upload($target, $item, $item_item);
        }
        
        return $result;
    }

    public function item_item_items($id){    
        $items = null;
        $items = Item::where(['id'=>$id])->orderBy('order_', 'asc')->orderBy('item', 'asc')->get();
        
        if($items){            
            $result = [
                'status' => 0,
                'msg' =>  'ID可以使用',
                'items'=> $items,
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => 'ID已經存在',
            ];
        }
        return $result;
    }

    public function item_item_all_update($id, $item_item){
        $update = true;
        for($i = 0; $i < count($id); $i++){
            $update &= Item::where(['id' => $id, 'no' => $no])->update($item_item[$i]);
        }
        if($update){
            $result = [
                'status' => 0,
                'msg' => '更新成功!',
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '更新失敗',
            ];
        }
        return $result;
    }

    public function item_item_add($id){        
        $ok = Item::create(['id' => $id]);
        // dd($item);
        
        if($ok){
            $item = Item::where(['no' => $ok['no']])->first();
            $result = [
                'status' => 0,
                'msg' =>  'ID可以使用',
                'item'=> $item,
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => 'ID已經存在',
            ];
        }
        return $result;
    }

    public function item_item_delete($id, $no){        
        $ok = Item::where(['id' => $id, 'no' => $no])->delete();
        if($ok){            
            $result = [
                'status' => 0,
                'msg' =>  'Item已刪除',
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => 'Item刪除失敗',
            ];
        }
        return $result;   
    }

    public function item_item_update($id, $no, $item_item){

        if(!empty($item_item['image'])){
            $item_target = Index::where(['id'=>$id])->first();
            $item_item_target = Item::where(['id' => $id, 'no' => $no])->first();
            $old_dir;
            $old_file_name;
            
            $dir = "";
            if($item_target['page'] != null && $item_target['item'] != null){
                $dir .= "index/".$item_target['page']."/".$item_target['item']."/";
            }            
            else if($item_target['page'] != null && $item_target['item'] == null){
                $dir .= "page/".$item_target['page']."/";
            }
            else if($item_target['page'] == null && $item_target['item'] != null){
                $dir .= "item/".$item_target['item']."/";
            }
            else if($item_target['page'] == null && $item_target['item'] == null){
                $dir .= "none/";
            }

            if($item_item['image'] != null){
                $dir .= $item_target['id']."/".$no."/";
            }

            $new_dir = File::dirname($item_item["image"])."/";
            $new_file_name = File::basename($item_item["image"]);

            $old_dir = File::dirname($item_item_target["image"])."/";
            $old_file_name = File::basename($item_item_target["image"]);
            //echo $old_dir;
           
            if($old_dir == '/upload/front/index/'.$dir && $old_dir.$old_file_name != $new_dir.$new_file_name){                
                // 本身目錄
                File::delete(base_path()."/public".$old_dir.$old_file_name);
                $files = File::allFiles(base_path()."/public".$old_dir);
                if(count($files) == 0){
                    rmdir(base_path()."/public".$old_dir);                        
                }
            }
        }
        
        $update = null;
        $update = Item::where(['id' => $id, 'no' => $no])->update($item_item);
       
        if($update){
            $result = [
                'status' => 0,
                'msg' => '更新成功!',
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '更新失敗',
            ];
        }
        return $result;
    }

    //--------------------------------------------------------------------------   

    public function item_item_upload($target, $item, $item_item){
        $file = Input::file('index_file');
        // dd($item);
        // return;
        $update;
        $filepath;
        if($file -> isValid()){
            //dd($file);
            $realPath = $file -> getRealPath();//临时文件的绝对路径
            $entension = $file -> getClientOriginalExtension();//上传文件的后缀
            // http://learningbyrecording.blogspot.tw/2015/01/php.html
            $name_origin = basename($file->getClientOriginalName(),'.'.$entension).'.'.$entension;
            $dir = "";
            if($item['page'] != null && $item['item'] != null){
                $dir .= "index/".$item['page']."/".$item['item']."/";
            }            
            else if($item['page'] != null && $item['item'] == null){
                $dir .= "page/".$item['page']."/";
            }
            else if($item['page'] == null && $item['item'] != null){
                $dir .= "item/".$item['item']."/";
            }
            else if($item['page'] == null && $item['item'] == null){
                $dir .= "none/";
            }
            if($target == "image"){
                $dir .= $item['id']."/".$item_item['no']."/";
            }

            if(!File::isDirectory(base_path().'/public/upload/front/index/'.$dir)){
                File::makeDirectory(base_path().'/public/upload/front/index/'.$dir, 0775, true);
            }   
            
            $item_item_target = Item::where(['id'=>$item['id'], 'no'=>$item_item['no']])->first();
            $old_dir;
            $old_file_name;

            if($target == "image"){
                $old_dir = File::dirname($item_item_target["image"])."/";
                $old_file_name = File::basename($item_item_target["image"]);
            }
            
            if($old_dir == '/upload/front/index/'.$dir){  
                // echo base_path()."/public".$old_dir.$old_file_name;
                // return ;     
                File::delete(base_path()."/public".$old_dir.$old_file_name);
            }

            $path = $file->move(base_path().'/public/upload/front/index/'.$dir, $name_origin);
            $filepath = '/upload/front/index/'.$dir.$name_origin;
            
            $update = Item::where(['id'=>$item['id'], 'no'=>$item_item['no']])->update([$target => $filepath]);              
        }     
        // echo $update;
        // return;
        if($update){
            $result = [
                'status' => 0,
                'msg' =>  '更新成功!',
                'image' => $filepath,
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '更新失敗',
            ];
        }
        return $result;
    }

    
}
