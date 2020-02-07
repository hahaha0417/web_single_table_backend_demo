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
namespace App\Http\Controllers\Backend\Device\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
// 
use App\Http\Models\Front\Device\List_;
use App\Http\Models\Front\Device\All\Device;
// 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use Redirect;

// 如要資料庫切換 原則上有三種方式
// 1. 多個Controller，Include一份General的Code : Controller會很多個，不好
// 2. 將資料庫用一個函式統一動態生成(對應多個資料庫) : 這樣有心資料庫只需修改該函式 : 有點麻煩
// 3. 使用hahaha修改的Model_Ha，只需餵入資料庫名稱生成物件即可處理不同資料庫 : 多個資料庫動態生成時採用
class ContentController extends Common3Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($index_dir, $index_model, $index_page)
    {
        $dir_count = 8;
        $cmd = new List_;
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                $cmd = $cmd->where(['dir'.($i + 1)=>""]); 
            }
            else{
                $cmd = $cmd->where(['dir'.($i + 1)=>$index_dir[$i]]); 
            }                         
        }
        $item = $cmd->first();
        // $item = List_::where(['class'=>$index_dir[0], 'model'=>$index_dir[1]])->first();

        if(empty($item)){
            // 沒紀錄
            return "List裡面沒有該節點，請建立List節點";
        }

        // --------------------------------------
        // 檢查是否有資料表
        $link = mysqli_connect('localhost', 'root', 'hahaha');
        
        $select_db = mysqli_select_db($link, $item['database_']);
        
        if (!$select_db) {
            // 沒有
            return "資料庫不存在";
        }
        else{
            // 檢查表
            // https://stackoverflow.com/questions/6432178/how-can-i-check-if-a-mysql-table-exists-with-php
            $is_product = mysqli_query($link, 'select 1 from hahaha LIMIT 1');
            if($is_product){

            }
            else{
                return "不相容的資料庫";
            }
        }   
        mysqli_close($link);       
        // -------------------------------------- 
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        // 資料庫畫面欄位原則上不建立在此頁面，因為使用者通常不會沒事同時修改多個Index資料庫
        // 可以建立在 http://114.32.144.211:8081/backend 的選單或該頁面的某個iframe頁面上

        // 原則上關於首頁的某頁，如果是少部分資料才可以建立在此資料庫，避免太髒太亂，
        // 又或者新開資料庫如 hahaha_front_index_index_other ，分開存放
        $index = Input::get('i_index', 'all');
        $page = Input::get('i_page', 'all');
        $item = Input::get('i_item', 'all');
        
        $data_count = 10;
        
        $index_list;
        $page_list;
        $item_list;        
        $data_list;
        
        if($index == "all" && $page == "all" && $item == "all"){
            $index_list = $device->where(["page" => "root", "item" => "index"])->distinct()->orderBy('order_', 'asc')->get();
            $page_list = $device->select("page")->distinct()->orderBy('page', 'asc')->get();
            $item_list = $device->select("item")->distinct()->orderBy('item', 'asc')->get();
            $data_list = $device->orderBy('page', 'asc')->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        }
        else if($index != "all" && $page == "all" && $item == "all"){
            $index_list = $device->where(["page" => "root", "item" => "index"])->where(["title_name" => $index])->distinct()->orderBy('order_', 'asc')->get();
            $page_list = $device->where(["page" => $index, "item" => "nav"])->orderBy('page', 'asc')->get();
            $item_list = $device->select("item")->where(["page" => $index])->distinct()->orderBy('item', 'asc')->get();
            $data_list = $device->where(["page" => $index])->orderBy('page', 'asc')->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        }
        else if($index == "all" && $page != "all" && $item == "all"){
            $index_list = $device->where(["page" => "root", "item" => "index"])->distinct()->orderBy('page', 'asc')->get();
            $page_list = $device->select("page")->distinct()->orderBy('page', 'asc')->get();
            $item_list = $device->select("item")->where(["page" => $page])->distinct()->orderBy('item', 'asc')->get();
            $data_list = $device->where(["page" => $page])->orderBy('page', 'asc')->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        }
        else if($index != "all" && $page != "all" && $item == "all"){
            $index_list = $device->where(["page" => "root", "item" => "index"])->where(["title_name" => $index])->distinct()->orderBy('order_', 'asc')->get();
            $page_list = $device->where(["page" => $index, "item" => "nav"])->orderBy('page', 'asc')->get();            
            $item_list = $device->select("item")->where(["page" => $index, "page" => $page])->distinct()->orderBy('item', 'asc')->get();
            $data_list = $device->where(["page" => $page])->orderBy('page', 'asc')->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        }
        else if($index == "all" && $page == "all" && $item != "all"){
            $index_list = $device->where(["page" => "root", "item" => "index"])->distinct()->orderBy('page', 'asc')->get();
            $page_list = $device->select("page")->distinct()->orderBy('page', 'asc')->get();
            $item_list = $device->select("item")->distinct()->orderBy('item', 'asc')->get();
            $data_list = $device->where(["item" => $item])->orderBy('page', 'asc')->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        
            // 尋找有無item
            // if($item_list->has($item)){                
            //     // return view('web.backend.device.model.content.index', compact('index', 'page', 'item', 'index_list', 'page_list', 'item_list', 'data_list'));    
            // }
            // else{
            //     return redirect('backend/device/'.$dir_.'/'.'content'.'/'.$index_page)->withInput(Input::except('i_item'));                              
            // }
        }
        else if($index != "all" && $page == "all" && $item != "all"){
            $index_list = $device->where(["page" => "root", "item" => "index"])->where(["title_name" => $index])->distinct()->orderBy('order_', 'asc')->get();
            $page_list = $device->where(["page" => $index, "item" => "nav"])->orderBy('page', 'asc')->get();
            $item_list = $device->select("item")->where(["page" => $index])->distinct()->orderBy('item', 'asc')->get();
            $data_list = $device->where(["page" => $index, "item" => $item])->orderBy('page', 'asc')->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
            
            // 尋找有無item
            // if($item_list->has($item)){                
            //     // return view('web.backend.device.model.content.index', compact('index', 'page', 'item', 'index_list', 'page_list', 'item_list', 'data_list'));    
            // }
            // else{
            //     return redirect('backend/device/'.$dir_.'/'.'content'.'/'.$index_page)->withInput(Input::except('i_item'));                              
            // }
        }
        else if($index == "all" && $page != "all" && $item != "all"){
            $index_list = $device->where(["page" => "root", "item" => "index"])->distinct()->orderBy('page', 'asc')->get();
            $page_list = $device->select("page")->distinct()->orderBy('page', 'asc')->get();
            $item_list = $device->select("item")->where(["page" => $page])->distinct()->orderBy('item', 'asc')->get();
            $data_list = $device->where(["page" => $page, "item" => $item])->orderBy('page', 'asc')->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        
            // 尋找有無item
            if($item_list->contains('item', $item)){                
                // return view('web.backend.device.model.content.index', compact('index', 'page', 'item', 'index_list', 'page_list', 'item_list', 'data_list'));    
            }
            else{
                //  要用網址方式傳，withInput，是直接存在Input攜帶
                $dir1_ = "";
                for($i = 0; $i < count($index_dir); ++$i){
                    if($index_dir[$i] == null){
                        break;
                    }
                    else{
                        $dir1_ .= '/'.$index_dir[$i];
                    }                         
                }
                $dir1_ .= '/model/'.$index_model;
                
                return redirect('backend/device/'.$dir1_.'/'.'content'.'/'.$index_page."?i_page=".$page);                            
            }
        }
        else if($index != "all" && $page != "all" && $item != "all"){
            $index_list = $device->where(["page" => "root", "item" => "index"])->where(["title_name" => $index])->distinct()->orderBy('order_', 'asc')->get();
            $page_list = $device->where(["page" => $index, "item" => "nav"])->orderBy('page', 'asc')->get();
            $item_list = $device->select("item")->where(["page" => $page])->distinct()->orderBy('item', 'asc')->get();
            $data_list = $device->where(["page" => $page, "item" => $item])->orderBy('page', 'asc')->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
            
            // 尋找有無item
            if($item_list->contains('item', $item)){                
                // return view('web.backend.device.model.content.index', compact('index', 'page', 'item', 'index_list', 'page_list', 'item_list', 'data_list'));    
            }
            else{                
                //  要用網址方式傳，withInput，是直接存在Input攜帶
                $dir1_ = "";
                for($i = 0; $i < count($index_dir); ++$i){
                    if($index_dir[$i] == null){
                        break;
                    }
                    else{
                        $dir1_ .= '/'.$index_dir[$i];
                    }                         
                }
                $dir1_ .= '/model/'.$index_model;
                return redirect('backend/device/'.$dir1_.'/'.'content'.'/'.$index_page."?i_index=".$index."&i_page=".$page);                             
            }
        }

        
                
        // 去除重複的資料
        // distinct()
        
        // dd($data_list);
        // return;

        //
        return view('web.backend.device.model.content.index', compact('index_dir', 'index_model', 'index_page', 'index', 'page', 'item', 'index_list', 'page_list', 'item_list', 'data_list'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($index_dir, $index_model, $index_page)
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($index_dir, $index_model, $index_page)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($index_dir, $index_model, $index_page, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($index_dir, $index_model, $index_page, $id)
    {       
        $device = new Device();
        $dir_count = 8;
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $item = $device->where(['id'=>$id])->first();    

        $auto_complete_tag;     
        
        $page_auto_complete_tag = $device->select("page")->distinct()->orderBy('page', 'asc')->get()->toArray();

        if($item['item'] != null){
            $item_auto_complete_tag = $device->select("item")->where(["page" => $item['page']])->distinct()->orderBy('item', 'asc')->get()->toArray();       
        }
        else{
            $item_auto_complete_tag = $device->select("item")->distinct()->orderBy('item', 'asc')->get()->toArray();
        }
        // dd($page_auto_complete_tag);
        // return;
            
        // $item_item = $device_item->where(['id'=>$id])->orderBy('item', 'asc')->orderBy('order_', 'asc')->get();
        return view('web.backend.device.model.content.edit', compact('dir_count', 'index_dir', 'index_model', 'index_page', 'item', 'page_auto_complete_tag', 'item_auto_complete_tag'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($index_dir, $index_model, $index_page, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($index_dir, $index_model, $index_page, $id)
    {
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $item = $device->where(['id'=>$id])->first();
        
        $dir = "";

        $item_page_dir = "";
        $item_item_dir = "";
        {
            //             
            if($item['page'] != null && $item['item'] != null){
                $dir .= "content/".$item['page']."/".$item['item']."/";
                $item_page_dir = "content/".$item['page']."/";
                $item_item_dir = "content/".$item['page']."/".$item['item']."/";
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

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '/'.$index_dir[$i];
            }                         
        }
        $dir_ .= '/model/'.$index_model;
                     
        $item_dir = '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir;
        $delete = true;  
                
        {   
            if(File::isDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir)){                
                // 清掉原有資料夾(id)
                File::deleteDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir);
                // 上兩層路徑是否為空
                if($item_page_dir != "" && $item_item_dir != ""){
                    $files_item = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_dir);
                    if(count($files_item) == 0){                    
                        rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_dir);
                        $files_page = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_dir);
                        if(count($files_page) == 0){
                            rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_dir);                        
                        }
                        else if(count($files_page) == 1){
                            // 似乎是刪不掉

                            // 由於刪除後可能檔案系統有紀錄，所以不一定等於0，要另外做處理                                
                            // if(!$files_page[0]->isDir() && !$files_page[0]->isFile()){
                            //     rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_temp_dir); 
                            // }
                        }
                    }
                }
                else if($item_page_dir != "" && $item_item_dir == ""){
                    $files_page = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_dir);
                    if(count($files_page) == 0){
                        rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_dir);                        
                    }                    
                }
                else if($item_page_dir == "" && $item_item_dir != ""){
                    $files_item = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_dir);
                    if(count($files_item) == 0){
                        rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_dir);                    
                    }
                }
                else if($item_page_dir == "" && $item_item_dir == ""){

                }      
            }      
       
            // $delete &= $device_item->where(["id"=>$id])->delete();  
            $delete &= $device->where(["id"=>$id])->delete();            
                   
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

    public function deal($index_dir, $index_model, $index_page)
    {
        $input = Input::except('_token','_method');
        $deal = $input["deal"];
        $method = $input['method'];
        if($deal == 'item'){
            $result = $this->item($index_dir, $index_model, $index_page, $input);
        }
        else if($deal == 'item_item'){
            $result = $this->item_item($index_dir, $index_model, $index_page, $input);
        }
        else if($deal == 'operate'){
            // 跨id處理資料
            // $result = $this->operate($input);
        }
        //
        else if($deal == '' && $method == 'all_update'){
            $item = $input["item"];
            $item_item = $input["item_item"];
            $result = $this->all_update($index_dir, $index_model, $index_page, $item, $item_item);
        }

        return $result;
    }
    // -------------------------------------------------------------------------------------
    public function all_update($index_dir, $index_model, $index_page, $item, $item_item)
    { 

    }
    // -------------------------------------------------------------------------------------
    // item 動作
    public function item($index_dir, $index_model, $index_page, $input)
    { 
        $method = $input['method'];
        $item = $input["item"];
        $result;
        // dd($item);
        
        if($method == "add"){
            $result = $this->item_add($index_dir, $index_model, $index_page, $item);
        }
        else if($method == "add_index"){
            $result = $this->item_add_index($index_dir, $index_model, $index_page, $item);
        }
        else if($method == "add_nav"){
            $result = $this->item_add_nav($index_dir, $index_model, $index_page, $item);
        }
        else if($method == "select_delete"){
            $id = $input["id"];
            $result = $this->item_select_delete($index_dir, $index_model, $index_page, $id);
        }
        else if($method == "update"){
            $id = $input["id"];
            $result = $this->item_update($index_dir, $index_model, $index_page, $id, $item);
        }
        else if($method == "all_save"){            
            $result = $this->item_all_save($index_dir, $index_model, $index_page, $item);
        }
        else if($method == "order"){
            $id = $input["id"];
            $result = $this->item_order($index_dir, $index_model, $index_page, $id, $item);
        }
        else if($method == "page_item_id_update"){
            $id = $input["id"];
            $result = $this->item_page_item_id_update($index_dir, $index_model, $index_page, $id, $item);
        }
        else if($method == "image_refresh"){
            $id = $input["id"];
            $target = $input["target"];
            $result = $this->item_image_refresh($index_dir, $index_model, $index_page, $target, $id, $item);
        }
        else if($method == "upload"){
            $target = $input["target"];
            $result = $this->item_upload($index_dir, $index_model, $index_page, $target, $item);
        }
        else if($method == "check_id"){
            $id = $input["id"];
            $result = $this->item_check_id($index_dir, $index_model, $index_page, $id);
        }

        return $result;
    }    

    public function item_add($index_dir, $index_model, $index_page, $item)
    {
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $find = $device->where(["id"=>$item["id"]])->first();
        
        $input = Input::except('_token','_method');
        $item_id = null;
        $ok = null;
        if(!$find)
        {            
            if(!$find){
                $ok = $device->create($item);
                $item_id = $device->where(["id"=>$item["id"]])->first();
            }
            else{                
                // 重複
            }

            // try {
            // $ok = $device->create($item);
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

    public function item_add_index($index_dir, $index_model, $index_page, $item)
    {
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $find = $device->where(["page"=>$item["page"],"item"=>$item["item"],"title_name"=>$item["title_name"]])->first();
        
        $input = Input::except('_token','_method');
        $item_id = null;
        $ok = null;
        
        if(!$find)
        {
            // 檢查ID是否重複
            $find_id = $device->where(["id"=>$item["id"]])->first();
            
            if(!$find_id){
                $ok = $device->create($item);                
                $item_id = $device->where(["id"=>$item["id"]])->first();
            }
            else{                
                // 重複
            }
            // try {
            // $ok = $device->create($item);
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

    public function item_add_nav($index_dir, $index_model, $index_page, $item)
    {
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }
        
        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $find = $device->where(["page"=>$item["page"],"item"=>$item["item"],"title_name"=>$item["title_name"]])->first();
        
        $input = Input::except('_token','_method');
        $item_id = null;
        $ok = null;
        
        if(!$find)
        {
            // 檢查ID是否重複
            $find_id = $device->where(["id"=>$item["id"]])->first();
            
            if(!$find_id){
                $ok = $device->create($item);                
                $item_id = $device->where(["id"=>$item["id"]])->first();
            }
            else{                
                // 重複
            }
            // try {
            // $ok = $device->create($item);
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

    public function item_select_delete($index_dir, $index_model, $index_page, $id){
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $device_item = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_item';
        }
        else{
            $use_page = $index_page.'_item';
        }

        $table1 = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device_item->setTable($table1);

        $delete = true;
        for($i = 0; $i < count($id); $i++){

            $item = $device->where(['id'=>$id[$i]])->first();
        
            $dir = "";

            $item_page_dir = "";
            $item_item_dir = "";
            {
                //             
                if($item['page'] != null && $item['item'] != null){
                    $dir .= "content/".$item['page']."/".$item['item']."/";
                    $item_page_dir = "content/".$item['page']."/";
                    $item_item_dir = "content/".$item['page']."/".$item['item']."/";
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

            $dir_ = "";
            for($i = 0; $i < count($index_dir); ++$i){
                if($index_dir[$i] == null){
                    break;
                }
                else{
                    $dir_ .= '/'.$index_dir[$i];
                }                         
            }
            $dir_ .= '/model/'.$index_model;
                        
            $item_dir = '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir;
            $delete;        
            {   
                if(File::isDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir)){                
                    // 清掉原有資料夾(id)
                    File::deleteDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir);
                    // 上兩層路徑是否為空
                    if($item_page_dir != "" && $item_item_dir != ""){
                        $files_item = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_dir);
                        if(count($files_item) == 0){                    
                            rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_dir);
                            $files_page = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_dir);
                            if(count($files_page) == 0){
                                rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_dir);                        
                            }
                            else if(count($files_page) == 1){
                                // 似乎是刪不掉

                                // 由於刪除後可能檔案系統有紀錄，所以不一定等於0，要另外做處理                                
                                // if(!$files_page[0]->isDir() && !$files_page[0]->isFile()){
                                //     rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_temp_dir); 
                                // }
                            }
                        }
                    }
                    else if($item_page_dir != "" && $item_item_dir == ""){
                        $files_page = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_dir);
                        if(count($files_page) == 0){
                            rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_dir);                        
                        }
                    }
                    else if($item_page_dir == "" && $item_item_dir != ""){
                        $files_item = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_dir);
                        if(count($files_item) == 0){
                            rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_dir);                    
                        }
                    }
                    else if($item_page_dir == "" && $item_item_dir == ""){

                    }      
                }     
            }

            $delete &= $device->where(['id'=>$id[$i]])->delete();            
            $test = $device_item->where(["id"=>$id[$i]])->get();
            if(count($test) > 0){
                $delete &= $device_item->where(["id"=>$id[$i]])->delete();  
                // dd($delete);
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

    public function item_update($index_dir, $index_model, $index_page, $id, $item){
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $update = null;
        $update = $device->where(['id' => $id])->update($item);
       
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

    public function item_all_save($index_dir, $index_model, $index_page, $item){
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $delete = true;
        for($i = 1; $i <= count($item); $i++){
            $delete &= $device->where(['id'=>$item[$i]["id"]])->update($item[$i]);            
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

    public function item_order($index_dir, $index_model, $index_page, $id, $item)
    {
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $update = $device->where(["id"=>$id])->update(["order_"=>$item["order_"]]);
         
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

    public function item_page_item_id_update($index_dir, $index_model, $index_page, $id, $item)
    {
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $device_item = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_item';
        }
        else{
            $use_page = $index_page.'_item';
        }

        $table1 = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device_item->setTable($table1);

        if(!empty($item['id']) && $item['id'] == ''){
            return $result = [
                'status' => 1,
                'msg' => '更新失敗',
            ];
        }
        if(!empty($item['id'])){
            $find = $device->where(["id"=>$item['id']])->first();
            if($find){
                return $result = [
                    'status' => 1,
                    'msg' => '更新失敗',
                ];
            }
        }

        $item_temp = $device->where(["id"=>$id])->first();
        $dir_temp = "";
        $dir = "";
        
        $item_page_temp_dir = "";
        $item_item_temp_dir = "";
        {
            //             
            if($item_temp['page'] != null && $item_temp['item'] != null){
                $dir_temp .= "content/".$item_temp['page']."/".$item_temp['item']."/";
                $item_page_temp_dir = "content/".$item_temp['page']."/";
                $item_item_temp_dir = "content/".$item_temp['page']."/".$item_temp['item']."/";
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
                    $dir .= "content/".$item['page']."/";
                }            
                else if($dir == "" && $item['page'] == null){
                    $dir .= "page/".$item['page']."/";
                }
            }
            else{
                if($dir == "" && $item_temp['page'] != null){
                    $dir .= "content/".$item_temp['page']."/";
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

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '/'.$index_dir[$i];
            }                         
        }
        $dir_ .= '/model/'.$index_model;
        
        $item_temp_dir = '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir_temp;
        $item_dir = '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir;
        
        if($item_temp_dir == $item_dir){
            // 圖片路徑沒有更動
        }
        else{            
            // 路徑更動
            if(!File::isDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir)){
                File::makeDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir, 0775, true);
            }   
            
            File::moveDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir_temp, base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir, true);
            
            if($item_page_temp_dir != "" && $item_item_temp_dir != ""){
                if(File::isDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_temp_dir)){    
                    $files_item = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_temp_dir);
                   
                    if(count($files_item) == 0){   
                        rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_temp_dir);
                        
                        if(File::isDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_temp_dir)){  
                            $files_page = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_temp_dir);
                                                                
                            if(count($files_page) == 0){
                                rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_temp_dir); 
                            }
                            else if(count($files_page) == 1){
                                // 似乎是刪不掉

                                // 由於刪除後可能檔案系統有紀錄，所以不一定等於0，要另外做處理                                
                                // if(!$files_page[0]->isDir() && !$files_page[0]->isFile()){
                                //     rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_temp_dir); 
                                // }
                            }
                        }                       
                    }
                }
                
                
            }
            else if($item_page_temp_dir != "" && $item_item_temp_dir == ""){
                if(File::isDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_temp_dir)){  
                    $files_page = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_page_temp_dir);
                
                    if(count($files_page) == 0){
                        rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_temp_dir);                  
                    }
                }
            }
            else if($item_page_temp_dir == "" && $item_item_temp_dir != ""){
                if(File::isDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_temp_dir)){  
                    $files_item = File::allFiles(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_temp_dir);
                
                    if(count($files_item) == 0){
                        rmdir(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$item_item_temp_dir); 
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

            $dir_ = "";
            for($i = 0; $i < count($index_dir); ++$i){
                if($index_dir[$i] == null){
                    break;
                }
                else{
                    $dir_ .= '/'.$index_dir[$i];
                }                         
            }
            $dir_ .= '/model/'.$index_model;
            
            $item_item_temp = $device_item->where(["id"=>$id])->get();
            
            for($i = 0; $i < count($item_item_temp); $i++){
                $modify = false;
                $item_item_image = $item_item_temp[$i]['image'];
                $item_item_image_temp_dir = File::dirname($item_item_temp[$i]['image'])."/";
                $item_item_image_temp_file_name = File::basename($item_item_temp[$i]['image']);
                  
                if($item_item_image_temp_dir == '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir_temp.$item_item_temp[$i]['no'].'/' &&
                $item_item_temp[$i]['image'] != $item_dir.$item_item_temp[$i]['no'].'/'.$item_item_image_temp_file_name){                    
                    $item_item_temp[$i]['image'] = $item_dir.$item_item_temp[$i]['no'].'/'.$item_item_image_temp_file_name;
                    
                    $modify = true;
                }
                if(!empty($item['id']) && $item_item_temp[$i]['id'] != $item['id']){
                    $item_item_temp[$i]['id'] = $item['id'];
                    $modify = true;
                }      
                if($modify == true){
                    $update &= $device_item->where(["id"=>$id, "no"=>$item_item_temp[$i]['no']])->update($item_item_temp[$i]->toArray());
                }      
            }
            $update &= $device->where(["id"=>$id])->update($item_temp->toArray());
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

    public function item_image_refresh($index_dir, $index_model, $index_page, $target, $id, $item)
    {
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $item_target = $device->where(['id'=>$id])->first();
        $old_dir;
        $old_file_name;
        
        $dir = "";
        if($item_target['page'] != null && $item_target['item'] != null){
            $dir .= "content/".$item_target['page']."/".$item_target['item']."/";
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

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '/'.$index_dir[$i];
            }                         
        }
        $dir_ .= '/model/'.$index_model;

        if($old_dir == '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir && $old_dir.$old_file_name != $new_dir.$new_file_name){
            // 本身目錄
            File::delete(base_path()."/public".$old_dir.$old_file_name);
            $files = File::allFiles(base_path()."/public".$old_dir);
            if(count($files) == 0){
                rmdir(base_path()."/public".$old_dir);                        
            }
        }

        $refresh = $device->where(["id"=>$id])->update([$target=>$item[$target]]);
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
    public function item_upload($index_dir, $index_model, $index_page, $target, $item)
    {
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

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
                $dir .= "content/".$item['page']."/".$item['item']."/";
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

            $item_target = $device->where(['id'=>$item['id']])->first();
            $old_dir;
            $old_file_name;

            $dir_ = "";
            for($i = 0; $i < count($index_dir); ++$i){
                if($index_dir[$i] == null){
                    break;
                }
                else{
                    $dir_ .= '/'.$index_dir[$i];
                }                         
            }
            $dir_ .= '/model/'.$index_model;

            if($target == "image"){
                $old_dir = File::dirname($item_target["image"])."/";
                $old_file_name = File::basename($item_target["image"]);
            }
            else if($target == "title_image"){
                $old_dir = File::dirname($item_target["title_image"])."/";
                $old_file_name = File::basename($item_target["title_image"]);
            }
            if($old_dir == '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir){  
                // echo base_path()."/public".$old_dir.$old_file_name;
                // return ;     
                File::delete(base_path()."/public".$old_dir.$old_file_name);                
            }

            $path = $file->move(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir, $name_origin);
            $filepath = '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir.$name_origin;
            
            $update = $device->where(['id'=>$item['id']])->update([$target => $filepath]);              
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

    public function item_check_id($index_dir, $index_model, $index_page, $id)
    {
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $id_list = $device->where(["id"=>$id]);
         
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
    public function item_item($index_dir, $index_model, $index_page, $input)
    {  
        $method = $input['method'];
        $item = $input["item"];
        $item_item = $input["item_item"];
        $result;

        if($method == "items"){    
            // 查詢項目        
            $id = $input["id"];
            $result = $this->item_item_items($index_dir, $index_model, $index_page, $id);
        }
        else if($method == "all_update"){
            $result = $this->item_item_all_update($index_dir, $index_model, $index_page, $id, $item_item);
        }
        //        
        else if($method == "add"){            
            $id = $input["id"];
            $result = $this->item_item_add($index_dir, $index_model, $index_page, $id);
        }
        else if($method == "delete"){
            $id = $input["id"];
            $no = $input["no"];
            $result = $this->item_item_delete($index_dir, $index_model, $index_page, $id, $no);
        }
        else if($method == "update"){
            $id = $input["id"];
            $no = $input["no"];
            $result = $this->item_item_update($index_dir, $index_model, $index_page, $id, $no, $item_item);
        }
        //
        else if($method == "upload"){
            $target = $input["target"];
            $result = $this->item_item_upload($index_dir, $index_model, $index_page, $target, $item, $item_item);
        }
        
        return $result;
    }

    public function item_item_items($index_dir, $index_model, $index_page, $id){  
        $device_item = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_item';
        }
        else{
            $use_page = $index_page.'_item';
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table1 = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device_item->setTable($table1);

        $items = null;
        $items = $device_item->where(['id'=>$id])->orderBy('order_', 'asc')->orderBy('item', 'asc')->get();
        
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

    public function item_item_all_update($index_dir, $index_model, $index_page, $id, $item_item){
        $device_item = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_item';
        }
        else{
            $use_page = $index_page.'_item';
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table1 = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device_item->setTable($table1);

        $update = true;
        for($i = 0; $i < count($id); $i++){
            $update &= $device_item->where(['id' => $id, 'no' => $no])->update($item_item[$i]);
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

    public function item_item_add($index_dir, $index_model, $index_page, $id){      
        $device_item = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_item';
        }
        else{
            $use_page = $index_page.'_item';
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table1 = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device_item->setTable($table1);

        $ok = $device_item->create(['id' => $id]);
        // dd($item);
        
        if($ok){
            $item = $device_item->where(['no' => $ok['no']])->first();
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

    public function item_item_delete($index_dir, $index_model, $index_page, $id, $no){  
        $device_item = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_item';
        }
        else{
            $use_page = $index_page.'_item';
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table1 = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device_item->setTable($table1);
              
        $ok = $device_item->where(['id' => $id, 'no' => $no])->delete();
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

    public function item_item_update($index_dir, $index_model, $index_page, $id, $no, $item_item){
        $device = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_';
        }
        else{
            $use_page = $index_page;
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device->setTable($table);

        $device_item = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_item';
        }
        else{
            $use_page = $index_page.'_item';
        }

        $table1 = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device_item->setTable($table1);

        if(!empty($item_item['image'])){
            $item_target = $device->where(['id'=>$id])->first();
            $item_item_target = $device_item->where(['id' => $id, 'no' => $no])->first();
            $old_dir;
            $old_file_name;
            
            $dir = "";
            if($item_target['page'] != null && $item_target['item'] != null){
                $dir .= "content/".$item_target['page']."/".$item_target['item']."/";
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

            $dir_ = "";
            for($i = 0; $i < count($index_dir); ++$i){
                if($index_dir[$i] == null){
                    break;
                }
                else{
                    $dir_ .= '/'.$index_dir[$i];
                }                         
            }
            $dir_ .= '/model/'.$index_model;
           
            if($old_dir == '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir && $old_dir.$old_file_name != $new_dir.$new_file_name){                
                // 本身目錄
                File::delete(base_path()."/public".$old_dir.$old_file_name);
                $files = File::allFiles(base_path()."/public".$old_dir);
                if(count($files) == 0){
                    rmdir(base_path()."/public".$old_dir);                        
                }
            }
        }
        
        $update = null;
        $update = $device_item->where(['id' => $id, 'no' => $no])->update($item_item);
       
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

    public function item_item_upload($index_dir, $index_model, $index_page, $target, $item, $item_item){
        $device_item = new Device();
        $use_page = "";
        if($index_page == 'index'){
            $use_page = $index_page.'_item';
        }
        else{
            $use_page = $index_page.'_item';
        }

        $dir_ = "";
        for($i = 0; $i < count($index_dir); ++$i){
            if($index_dir[$i] == null){
                break;
            }
            else{
                $dir_ .= '_'.$index_dir[$i];
            }                         
        }
        $dir_ .= '_model_'.$index_model;

        $table1 = 'hahaha_front_device'.$dir_.'.'.$use_page;        
        $device_item->setTable($table1);

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
                $dir .= "content/".$item['page']."/".$item['item']."/";
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

            $dir_ = "";
            for($i = 0; $i < count($index_dir); ++$i){
                if($index_dir[$i] == null){
                    break;
                }
                else{
                    $dir_ .= '/'.$index_dir[$i];
                }                         
            }
            $dir_ .= '/model/'.$index_model;

            if(!File::isDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir)){
                File::makeDirectory(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir, 0775, true);
            }   
            
            $item_item_target = $device_item->where(['id'=>$item['id'], 'no'=>$item_item['no']])->first();
            $old_dir;
            $old_file_name;

            if($target == "image"){
                $old_dir = File::dirname($item_item_target["image"])."/";
                $old_file_name = File::basename($item_item_target["image"]);
            }
            
            if($old_dir == '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir){  
                // echo base_path()."/public".$old_dir.$old_file_name;
                // return ;     
                File::delete(base_path()."/public".$old_dir.$old_file_name);
            }

            $path = $file->move(base_path().'/public/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir, $name_origin);
            $filepath = '/upload/front/device'.$dir_.'/'.'content/'.$index_page.'/'.$dir.$name_origin;
            
            $update = $device_item->where(['id'=>$item['id'], 'no'=>$item_item['no']])->update([$target => $filepath]);              
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
    //--------------------------------------------------------------------------   
    // 入口頁面
    //--------------------------------------------------------------------------   
    public function index_enter($index_dir, $index_model){

    }
    //--------------------------------------------------------------------------   
}
