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
namespace App\Http\Controllers\Backend\Device;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
// 
use App\Http\Models\Front\Device\List_;
use App\Http\Models\Front\Device\Tree;
use App\Http\Models\Front\Device\All\Device;
// 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Schema;
use DB;
use Redirect;

// 如要資料庫切換 原則上有三種方式
// 1. 多個Controller，Include一份General的Code : Controller會很多個，不好
// 2. 將資料庫用一個函式統一動態生成(對應多個資料庫) : 這樣有心資料庫只需修改該函式 : 有點麻煩
// 3. 使用hahaha修改的Model_Ha，只需餵入資料庫名稱生成物件即可處理不同資料庫 : 多個資料庫動態生成時採用
class ListController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($index_dir)
    {
        // 統一冠i，因為page時可能會被laravel的分頁(page=?))占去，因此讓開一系列的命名
        $i_dir = array();
        $dir_count = 8;
        for($i = 0; $i < $dir_count; ++$i){
            $i_dir[$i] = Input::get('i_dir'.($i + 1), 'all');    
        }       
        // dd($i_dir);         
        $data_count = 10;   

        $dir_list;
        $dir_default_list;
        $data_list;
        
        for($i = 0; $i < $dir_count; ++$i){
            {
                $cmd = List_::select("dir".($i + 1));
                for($j = 0; $j < $i; ++$j){
                    if($i_dir[$j] == 'all'){
                        $cmd = $cmd->where('dir'.($j + 1), '<>' , ""); 
                    }
                    else{
                        $cmd = $cmd->where(['dir'.($j + 1)=>$i_dir[$j]]); 
                    }                   
                }
                if($i_dir[$i] == "all"){
                    $cmd = $cmd->where('dir'.($i + 1), '<>' , ""); 
                }
                $dir_list[$i] = $cmd->distinct()->orderBy('dir'.($i + 1), 'asc')->get();
            }
            
            {
                $cmd = Tree::select("dir".($i + 1));
                for($j = 0; $j < $i; ++$j){                    
                    if($i_dir[$j] == 'all'){                        
                        $cmd = $cmd->where('dir'.($j + 1), '<>' , ""); 
                    }
                    else{
                        $cmd = $cmd->where(['dir'.($j + 1)=>$i_dir[$j]]); 
                    }                   
                }
                if($i_dir[$i] == "all"){
                    $cmd = $cmd->where('dir'.($i + 1), '<>' , ""); 
                }
                $dir_default_list[$i] = $cmd->distinct()->orderBy('dir'.($i + 1), 'asc')->get();
            }
        }
        // dd($dir_default_list);
        
        // 判斷路徑是否消失
        $level = 8;        
        $origin = 8;
        for($i = 0; $i < $dir_count; ++$i){
            if($i_dir[$i] != "all"){
                $origin = $i;
            }
            for($j = 0; $j < count($dir_list[$i]); ++$j){                
                if($i_dir[$i] != "all" && $i_dir[$i] == $dir_list[$i][$j]["dir".($i + 1)]){
                    $level = $i;
                    break;
                }
            }
            for($j = 0; $j < count($dir_default_list[$i]); ++$j){                
                if($i_dir[$i] != "all" && $i_dir[$i] == $dir_default_list[$i][$j]["dir".($i + 1)]){
                    $level = $i;
                    break;
                }
            }
        }
        // dd($origin);
        $str = "";
        $first = false;
        if($level != 8){
            for($i = $level; $i <= $level; ++$i){
                if($i_dir[$i] == "all"){
                    break;
                }
                if(!$first){
                    $str .= "?"."i_dir".($i + 1)."=".$i_dir[$i];
                    $first = true;
                }
                else{
                    $str .= "&"."i_dir".($i + 1)."=".$i_dir[$i];
                }
            }      
        }                 
        
        // dd($origin);
        if($level != $origin){
            return redirect('backend/device/list'.$str);       
        }

        $web_dir_list;
        
        // dd($dir_default_list);
        $cmd = new List_;
        for($i = 0; $i < $dir_count; ++$i){
            if($i_dir[$i] == 'all'){
                // 不管有無都抓
                // $cmd = $cmd->where('dir'.($j + 1), '<>' , ""); 
            }
            else{
                $cmd = $cmd->where(['dir'.($i + 1)=>$i_dir[$i]]); 
            }                   
        }
        for($i = 0; $i < $dir_count; ++$i){
            $cmd = $cmd->orderBy('dir'.($i + 1), 'asc');                
        }
        $data_list = $cmd->orderBy('order_', 'asc')->orderBy('model', 'asc')->paginate($data_count)->appends(request()->query());
        for($i = 0; $i < count($data_list); ++$i){
            $str = url("device/");
            // dd($str);
            for($j = 0; $j < $dir_count; ++$j){
                if($data_list[$i]['dir'.($j + 1)] != ""){
                    $str .= "/".$data_list[$i]['dir'.($j + 1)];
                }
                else{
                    break;
                }                              
            }
            $str .= "/model/".$data_list[$i]['model'];
            // dd($data_list);
            $data_list[$i]['web_dir'] = $str;
        }

        for($i = 0; $i < count($data_list); ++$i){
            $str = url("backend/device/");
            // dd($str);
            for($j = 0; $j < $dir_count; ++$j){
                if($data_list[$i]['dir'.($j + 1)] != ""){
                    $str .= "/".$data_list[$i]['dir'.($j + 1)];
                }
                else{
                    break;
                }                              
            }
            $str .= "/model/".$data_list[$i]['model'];
            // dd($data_list);
            $data_list[$i]['backend_web_dir'] = $str;
        }
        // dd($data_list);
        // dd(request()->query());
        // dd($data_list);

        // 找到資料庫的相對應資料
        $device = new Device();
        
        $image_list = array();
        for($i = 0; $i < count($data_list); $i++){   
            // dd($data_list[$i]['database_']);         
            $table = $data_list[$i]['database_'].'.device';  
            
            // --------------------------------------
            // 檢查是否有資料表
            $link = mysqli_connect('localhost', 'root', 'hahaha');
            
            $select_db = mysqli_select_db($link, $data_list[$i]['database_']);
            
            if (!$select_db) {
                // 沒有
                $image_list[$i] = "#";
                continue;
                // return "資料庫不存在";
            }
            else{
                // 檢查表
                // https://stackoverflow.com/questions/6432178/how-can-i-check-if-a-mysql-table-exists-with-php
                $is_device = mysqli_query($link, 'select 1 from hahaha LIMIT 1');
                if($is_device){

                }
                else{
                    $image_list[$i] = "#";
                    continue;
                    // return "不相容的資料庫";
                }
            }        
            // --------------------------------------     
            $device->setTable($table);             
            $data = $device->where(['item'=>'Device'])->first();
            if($data == null){
                $image_list[$i] = "#";
                continue;
            }
            else{
                $image_list[$i] = $data['image'];
            }
        }
        // // dd($class_);
        // // 去除重複的資料
        // // distinct()        
        // dd($image_list);

        // //
        // dd($dir_default_list);
        return view('web.backend.device.list.index', compact(
            'dir_count',
            'index_dir',
            'i_dir', 
            'dir_list',
            'dir_default_list',
            'data_list',
            'image_list'
        ));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($index_dir)
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
    public function store($index_dir)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($index_dir, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($index_dir, $id)
    {       
        // 統一冠i，因為page時可能會被laravel的分頁(page=?))占去，因此讓開一系列的命名
        $i_dir = array();
        $dir_count = 8;
        for($i = 0; $i < $dir_count; ++$i){
            $i_dir[$i] = Input::get('i_dir'.($i + 1), 'all');    
        }    

        $dir_count = 8;
        $item = List_::where(['id'=>$id])->first();    

        $device = new Device();
        $table = $item['database_'].'.device';  
        // --------------------------------------
        // 檢查是否有資料表
        $link = mysqli_connect('localhost', 'root', 'hahaha');
        
        $select_db = mysqli_select_db($link, $item['database_']);
        
        if (!$select_db) {
            // 沒有
            $image = "#";
            return view('web.backend.device.list.edit', compact('dir_count', 'i_dir', 'item', 'image'));  
            // return "資料庫不存在";
        }
        else{
            // 檢查表
            // https://stackoverflow.com/questions/6432178/how-can-i-check-if-a-mysql-table-exists-with-php
            $is_device = mysqli_query($link, 'select 1 from hahaha LIMIT 1');
            if($is_device){

            }
            else{
                $image = "#";
                return view('web.backend.device.list.edit', compact('dir_count', 'i_dir', 'item', 'image'));  
                // return "不相容的資料庫";
            }
        }        
        // --------------------------------------     
        $device->setTable($table);             
        $data = $device->where(['item'=>'Device'])->first();
        // dd($data);
        if($data == null){
            $image = "#";
        }
        else{
            $image = $data['image'];
        }
        // dd($image);
        
        return view('web.backend.device.list.edit', compact('dir_count', 'i_dir', 'item', 'image'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($index_dir, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($index_dir, $id)
    {
        $delete = true;  
                
        {   
            $delete &= List_::where(["id"=>$id])->delete();            
            // $delete &= Item::where(["id"=>$id])->delete();         
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

    public function deal($index_dir)
    {
        $input = Input::except('_token','_method');
        $deal = $input["deal"];
        $method = $input['method'];
        
        if($deal == 'page'){
            // 本頁的處理
            $result = $this->page($index_dir, $input);
        }
        else if($deal == 'item'){
            $result = $this->item($index_dir, $input);
        }
        else if($deal == 'item_item'){
            $result = $this->item_item($index_dir, $input);
        }
        // else if($deal == 'operate'){
        //     // 跨id處理資料
        //     // $result = $this->operate($input);
        // }
        // //
        // else if($deal == '' && $method == 'all_update'){
        //     $item = $input["item"];
        //     $item_item = $input["item_item"];
        //     $result = $this->all_update($item, $item_item);
        // }

        return $result;
    }
    // -------------------------------------------------------------------------------------
    public function all_update($item, $item_item)
    { 

    }
    // -------------------------------------------------------------------------------------
    // page 動作
    public function page($index_dir, $input)
    {
        $method = $input['method'];
        $item = $input["item"];
        $result;
        
        if($method == "add_default"){
            $result = $this->add_default($index_dir, $item);
        }
        else if($method == "delete_default"){
            $result = $this->delete_default($index_dir, $item);
        }

        return $result;
    }

    public function add_default($index_dir, $item)
    { 
        $dir_count = 8;

        $input = Input::except('_token','_method');
        $item_id = null;
        $ok = null;
        
        $find = new Tree;
        for($i = 0; $i < $dir_count; ++$i){
            if($item["dir".($i + 1)] == "all"){
                $item['dir'.($i + 1)] = "";
            }
            if($item['dir'.($i + 1)] != ""){
                $find = $find->where(["dir".($i + 1)=>$item["dir".($i + 1)]]);
            }
            else{   
                $find = $find->where("dir".($i + 1), "<>", "");             
            }
        }
        $find = $find->first();
        // dd($find);
        if(!$find){      
            for($i = 0; $i < $dir_count; ++$i){
                if($item["dir".($i + 1)] == null){
                    $item['dir'.($i + 1)] = "";
                }
            }      
            $ok = Tree::create($item);
            
            $item_id = new Tree;
            for($i = 0; $i < $dir_count; ++$i){
                if($item["dir".($i + 1)] == "all"){
                    $item['dir'.($i + 1)] = "";
                }
                if($item['dir'.($i + 1)] != ""){
                    $item_id = $item_id->where(["dir".($i + 1)=>$item["dir".($i + 1)]]);
                }
                else{   
                    $item_id = $item_id->where("dir".($i + 1), "<>", "");                  
                }
            }
            $item_id = $item_id->first();
        }
        else{                
            // 重複
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
                    'msg' => '重複，請更改!',
                ];
            }         
            else
            {
                if($item_id)
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

    public function delete_default($index_dir, $item)
    { 
        $dir_count = 8;
        $delete = new Tree;
        for($i = 0; $i < $dir_count; ++$i){
            if($item["dir".($i + 1)] == "all" || $item["dir".($i + 1)] == null){
                $item['dir'.($i + 1)] = "";
            }
            if($item['dir'.($i + 1)] != ""){
                $delete = $delete->where(["dir".($i + 1)=>$item["dir".($i + 1)]]);
            }
            else{
                $delete = $delete->where(["dir".($i + 1)=>""]);
            }
        }
        
        $delete = $delete->delete();
        // dd($delete);
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
    // -------------------------------------------------------------------------------------
    // item 動作
    public function item($index_dir, $input)
    { 
        $method = $input['method'];
        $item = $input["item"];
        $result;
        // dd($item);
        
        if($method == "add"){
            $result = $this->item_add($index_dir, $item);
        }
        // else if($method == "add_index"){
        //     $result = $this->item_add_index($item);
        // }
        // else if($method == "add_nav"){
        //     $result = $this->item_add_nav($item);
        // }
        else if($method == "select_delete"){
            $id = $input["id"];
            $result = $this->item_select_delete($index_dir, $id);
        }
        else if($method == "update"){
            $id = $input["id"];
            $result = $this->item_update($index_dir, $id, $item);
        }
        else if($method == "all_save"){            
            $result = $this->item_all_save($index_dir, $item);
        }
        else if($method == "order"){
            $id = $input["id"];
            $result = $this->item_order($index_dir, $id, $item);
        }
        // else if($method == "page_item_id_update"){
        //     $id = $input["id"];
        //     $result = $this->item_page_item_id_update($id, $item);
        // }
        // else if($method == "image_refresh"){
        //     $id = $input["id"];
        //     $target = $input["target"];
        //     $result = $this->item_image_refresh($target, $id, $item);
        // }
        // else if($method == "upload"){
        //     $target = $input["target"];
        //     $result = $this->item_upload($target, $item);
        // }
        // else if($method == "check_id"){
        //     $id = $input["id"];
        //     $result = $this->item_check_id($id);
        // }
        else if($method == "enabled"){
            $id = $input["id"];
            $result = $this->item_enabled($index_dir, $id, $item);
        }
        else if($method == "maintain"){
            $id = $input["id"];
            $result = $this->item_maintain($index_dir, $id, $item);
        }
        else if($method == "create_database"){
            $result = $this->item_create_database($index_dir, $item);
        }
        else if($method == "drop_database"){
            $result = $this->item_drop_database($index_dir, $item);
        }
        else if($method == "find_database"){
            $result = $this->item_find_database($index_dir, $item);
        }
        return $result;
    }    

    public function item_add($index_dir, $item)
    {
        $dir_count = 8;
        $cmd = new List_;
        $cmd = $cmd->where(['id'=>$item['id']]); 
        $find_id = $cmd->first();
        $find = null;
        if(!$find_id){
            $cmd = new List_;
            for($i = 0; $i < $dir_count; ++$i){
                {                
                    if($item['dir'.($i + 1)] == null){
                        $cmd = $cmd->where(['dir'.($i + 1)=>""]); 
                    }
                    else{
                        $cmd = $cmd->where(['dir'.($i + 1)=>$item['dir'.($i + 1)]]); 
                    }  
                }
            }
            $cmd = $cmd->where(['model'=>$item['model']]); 
            $find = $cmd->first();
        }
        
        
        // dd($find);
        // $input = List_::except('_token','_method');
        $item_id = null;
        $ok = null;
        if(!$find_id && !$find)
        {            
            if(!$find){
                for($i = 0; $i < $dir_count; ++$i){
                    if($item["dir".($i + 1)] == null){
                        $item["dir".($i + 1)] = "";
                    }
                }
                if($item["device"] == null){
                    $item["device"] = "";
                }
                if($item["database_"] == null){
                    $item["database_"] = "";
                }
                // dd($item);
                $ok = List_::create($item);

                $item_id = List_::where($item)->first();
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
                    'msg' => 'dir上的model已有，請更改!',
                ];
            }    
            else if($find_id)
            {
                $result = [
                    'status' => 1,
                    'msg' => 'id重複，請更改!',
                ];
            }        
            else
            {
                if($item_id)
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
        // $find = Index::where(["page"=>$item["page"],"item"=>$item["item"],"title_name"=>$item["title_name"]])->first();
        
        // $input = Input::except('_token','_method');
        // $item_id = null;
        // $ok = null;
        
        // if(!$find)
        // {
        //     // 檢查ID是否重複
        //     $find_id = Index::where(["id"=>$item["id"]])->first();
            
        //     if(!$find_id){
        //         $ok = Index::create($item);                
        //         $item_id = Index::where(["id"=>$item["id"]])->first();
        //     }
        //     else{                
        //         // 重複
        //     }
        //     // try {
        //     // $ok = Index::create($item);
        //     // } catch (QueryException $e) {
        //     //     dd($e);
        //     //     return;
        //     // }
        // }
        
        // if($ok){
        //     $result = [
        //         'status' => 0,
        //         'msg' => '建立成功!',
        //         'item' => $item_id,
        //     ];
        // }
        // else{   
        //     if($find)
        //     {
        //         $result = [
        //             'status' => 1,
        //             'msg' => 'Title Name重複，請更改標題!',
        //         ];
        //     }         
        //     else
        //     {
        //         if($find_id)
        //         {
        //             $result = [
        //                 'status' => 1,
        //                 'msg' => 'ID重複，請更改標題!',
        //             ];
        //         }                
        //     }    
        // }
        // return $result;
    }

    public function item_add_nav($item)
    {
        // $find = Index::where(["page"=>$item["page"],"item"=>$item["item"],"title_name"=>$item["title_name"]])->first();
        
        // $input = Input::except('_token','_method');
        // $item_id = null;
        // $ok = null;
        
        // if(!$find)
        // {
        //     // 檢查ID是否重複
        //     $find_id = Index::where(["id"=>$item["id"]])->first();
            
        //     if(!$find_id){
        //         $ok = Index::create($item);                
        //         $item_id = Index::where(["id"=>$item["id"]])->first();
        //     }
        //     else{                
        //         // 重複
        //     }
        //     // try {
        //     // $ok = Index::create($item);
        //     // } catch (QueryException $e) {
        //     //     dd($e);
        //     //     return;
        //     // }
        // }
        
        // if($ok){
        //     $result = [
        //         'status' => 0,
        //         'msg' => '建立成功!',
        //         'item' => $item_id,
        //     ];
        // }
        // else{   
        //     if($find)
        //     {
        //         $result = [
        //             'status' => 1,
        //             'msg' => 'Title Name重複，請更改標題!',
        //         ];
        //     }         
        //     else
        //     {
        //         if($find_id)
        //         {
        //             $result = [
        //                 'status' => 1,
        //                 'msg' => 'ID重複，請更改標題!',
        //             ];
        //         }                
        //     }    
        // }
        // return $result;
    }

    public function item_select_delete($index_dir, $id){
        $delete = true;
        for($i = 0; $i < count($id); $i++){
            
            $delete &= List_::where(["id"=>$id[$i]])->delete();  
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

    public function item_update($index_dir, $id, $item){
        $update = null;
        if($item["enabled"] == "true"){
            $item["enabled"] = 1;
        }                 
        else{
            $item["enabled"] = 0;
        }
        if($item["maintain"] == "true"){
            $item["maintain"] = 1;
        }                 
        else{
            $item["maintain"] = 0;
        }   
        $update = List_::where(['id' => $id])->update($item);
       
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

    public function item_all_save($index_dir, $item){   
        $dir_count = 8;     
        $update = true;
        for($i = 1; $i <= count($item); $i++){
            if($item[$i]["enabled"] == "true"){
                $item[$i]["enabled"] = 1;
            }                 
            else{
                $item[$i]["enabled"] = 0;
            }
            if($item[$i]["maintain"] == "true"){
                $item[$i]["maintain"] = 1;
            }                 
            else{
                $item[$i]["maintain"] = 0;
            }   
            $update &= List_::where(['id'=>$item[$i]["id"]])->update($item[$i]);            
        }
        if($update){
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

    public function item_order($index_dir, $id, $item)
    {
        $update = List_::where(["id"=>$id])->update(["order_"=>$item["order_"]]);
         
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
        // if(!empty($item['id']) && $item['id'] == ''){
        //     return $result = [
        //         'status' => 1,
        //         'msg' => '更新失敗',
        //     ];
        // }
        // if(!empty($item['id'])){
        //     $find = Index::where(["id"=>$item['id']])->first();
        //     if($find){
        //         return $result = [
        //             'status' => 1,
        //             'msg' => '更新失敗',
        //         ];
        //     }
        // }

        // $item_temp = Index::where(["id"=>$id])->first();
        // $dir_temp = "";
        // $dir = "";
        
        // $item_page_temp_dir = "";
        // $item_item_temp_dir = "";
        // {
        //     //             
        //     if($item_temp['page'] != null && $item_temp['item'] != null){
        //         $dir_temp .= "index/".$item_temp['page']."/".$item_temp['item']."/";
        //         $item_page_temp_dir = "index/".$item_temp['page']."/";
        //         $item_item_temp_dir = "index/".$item_temp['page']."/".$item_temp['item']."/";
        //     }            
        //     else if($item_temp['page'] != null && $item_temp['item'] == null){
        //         $dir_temp .= "page/".$item_temp['page']."/";
        //         $item_page_temp_dir = "page/".$item_temp['page']."/";                
        //     }
        //     else if($item_temp['page'] == null && $item_temp['item'] != null){
        //         $dir_temp .= "item/".$item_temp['item']."/";
        //         $item_item_temp_dir = "item/".$item_temp['item']."/";
        //     }
        //     else if($item_temp['page'] == null && $item_temp['item'] == null){
        //         $dir_temp .= "none/";
        //     }
        //     $dir_temp .= $item_temp['id']."/";            
        // }

        // {
        //     if(!empty($item['page'])){
        //         if($index_dir == "" && $item['page'] != null){
        //             $dir .= "index/".$item['page']."/";
        //         }            
        //         else if($index_dir == "" && $item['page'] == null){
        //             $dir .= "page/".$item['page']."/";
        //         }
        //     }
        //     else{
        //         if($index_dir == "" && $item_temp['page'] != null){
        //             $dir .= "index/".$item_temp['page']."/";
        //         }            
        //         else if($index_dir == "" && $item_temp['page'] == null){
        //             $dir .= "page/".$item_temp['page']."/";
        //         }
        //     }

        //     if(!empty($item['item'])){
        //         if($index_dir != "" && $item['item'] != null){
        //             $dir .= $item['item']."/";
        //         }            
        //         else if($index_dir != "" && $item['item'] == null){
                    
        //         }
        //         else if($index_dir == "" && $item['item'] != null){
        //             $dir .= "item/".$item['item']."/";
        //         }            
        //         else if($index_dir == "" && $item['item'] == null){
        //             $dir .= "none/";
        //         }
        //     }
        //     else{
        //         if($index_dir != "" && $item_temp['item'] != null){
        //             $dir .= $item_temp['item']."/";
        //         }            
        //         else if($index_dir != "" && $item_temp['item'] == null){
                    
        //         }
        //         else if($index_dir == "" && $item_temp['item'] != null){
        //             $dir .= "item/".$item_temp['item']."/";
        //         }            
        //         else if($index_dir == "" && $item_temp['item'] == null){
        //             $dir .= "none/";
        //         }
        //     }

        //     if(!empty($item['id'])){
        //         $dir .= $item['id']."/";
        //     }
        //     else{
        //         $dir .= $item_temp['id']."/";
        //     }                      
        // }
           
        // $update = true;

        // // https://laravel.com/docs/5.6/facades
        // // http://php.net/manual/zh/ref.filesystem.php            
        // $image_temp_dir = File::dirname($item_temp["image"])."/";
        // $image_temp_file_name = File::basename($item_temp["image"]);

        // $title_image_temp_dir = File::dirname($item_temp["title_image"])."/";
        // $title_image_temp_file_name = File::basename($item_temp["title_image"]);
        
        // $item_temp_dir = '/upload/front/index/'.$dir_temp;
        // $item_dir = '/upload/front/index/'.$dir;
        
        // if($item_temp_dir == $item_dir){
        //     // 圖片路徑沒有更動
        // }
        // else{            
        //     // 路徑更動
        //     if(!File::isDirectory(base_path().'/public/upload/front/index/'.$dir)){
        //         File::makeDirectory(base_path().'/public/upload/front/index/'.$dir, 0775, true);
        //     }   
            
        //     File::moveDirectory(base_path().'/public/upload/front/index/'.$dir_temp, base_path().'/public/upload/front/index/'.$dir, true);
            
        //     if($item_page_temp_dir != "" && $item_item_temp_dir != ""){
        //         if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_item_temp_dir)){    
        //             $files_item = File::allFiles(base_path().'/public/upload/front/index/'.$item_item_temp_dir);
                   
        //             if(count($files_item) == 0){   
        //                 rmdir(base_path().'/public/upload/front/index/'.$item_item_temp_dir);
                        
        //                 if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_page_temp_dir)){  
        //                     $files_page = File::allFiles(base_path().'/public/upload/front/index/'.$item_page_temp_dir);
                                                                
        //                     if(count($files_page) == 0){
        //                         rmdir(base_path().'/public/upload/front/index/'.$item_page_temp_dir); 
        //                     }
        //                     else if(count($files_page) == 1){
        //                         // 似乎是刪不掉

        //                         // 由於刪除後可能檔案系統有紀錄，所以不一定等於0，要另外做處理                                
        //                         // if(!$files_page[0]->isDir() && !$files_page[0]->isFile()){
        //                         //     rmdir(base_path().'/public/upload/front/index/'.$item_page_temp_dir); 
        //                         // }
        //                     }
        //                 }                       
        //             }
        //         }
                
                
        //     }
        //     else if($item_page_temp_dir != "" && $item_item_temp_dir == ""){
        //         if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_item_temp_dir)){  
        //             $files_page = File::allFiles(base_path().'/public/upload/front/index/'.$item_page_temp_dir);
                
        //             if(count($files_page) == 0){
        //                 rmdir(base_path().'/public/upload/front/index/'.$item_item_temp_dir);                  
        //             }
        //         }
        //     }
        //     else if($item_page_temp_dir == "" && $item_item_temp_dir != ""){
        //         if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_item_temp_dir)){  
        //             $files_item = File::allFiles(base_path().'/public/upload/front/index/'.$item_item_temp_dir);
                
        //             if(count($files_item) == 0){
        //                 rmdir(base_path().'/public/upload/front/index/'.$item_item_temp_dir); 
        //             }
        //         }
        //     }
        //     else if($item_page_temp_dir == "" && $item_item_temp_dir == ""){

        //     }      
            
        //     if($image_temp_dir == $item_temp_dir){
        //         $item_temp["image"] = $item_dir.$image_temp_file_name;
        //     }
        //     if($title_image_temp_dir == $item_temp_dir){
        //         $item_temp["title_image"] = $item_dir.$title_image_temp_file_name;
        //     }
        //     if(!empty($item['page'])){
        //         $item_temp['page'] = $item['page'];
        //     }
        //     if(!empty($item['item'])){
        //         $item_temp['item'] = $item['item'];
        //     }
        //     if(!empty($item['id'])){
        //         $item_temp['id'] = $item['id'];
        //     }

            
            
        //     $item_item_temp = Item::where(["id"=>$id])->get();
            
        //     for($i = 0; $i < count($item_item_temp); $i++){
        //         $modify = false;
        //         $item_item_image = $item_item_temp[$i]['image'];
        //         $item_item_image_temp_dir = File::dirname($item_item_temp[$i]['image'])."/";
        //         $item_item_image_temp_file_name = File::basename($item_item_temp[$i]['image']);
                  
        //         if($item_item_image_temp_dir == '/upload/front/index/'.$dir_temp.$item_item_temp[$i]['no'].'/' &&
        //         $item_item_temp[$i]['image'] != $item_dir.$item_item_temp[$i]['no'].'/'.$item_item_image_temp_file_name){                    
        //             $item_item_temp[$i]['image'] = $item_dir.$item_item_temp[$i]['no'].'/'.$item_item_image_temp_file_name;
                    
        //             $modify = true;
        //         }
        //         if(!empty($item['id']) && $item_item_temp[$i]['id'] != $item['id']){
        //             $item_item_temp[$i]['id'] = $item['id'];
        //             $modify = true;
        //         }      
        //         if($modify == true){
        //             $update &= Item::where(["id"=>$id, "no"=>$item_item_temp[$i]['no']])->update($item_item_temp[$i]->toArray());
        //         }      
        //     }
        //     $update &= Index::where(["id"=>$id])->update($item_temp->toArray());
        // }

        // if($update){
        //     $result = [
        //         'status' => 0,
        //         'msg' =>  '更新成功!',
        //         'item' => $item_temp,
        //         'item_item' => $item_item_temp,
        //     ];
        // }
        // else{   
        //     $result = [
        //         'status' => 1,
        //         'msg' => '更新失敗',
        //     ];
        // }
        // return $result;
    }

    public function item_image_refresh($target, $id, $item)
    {
        // $item_target = Index::where(['id'=>$id])->first();
        // $old_dir;
        // $old_file_name;
        
        // $dir = "";
        // if($item_target['page'] != null && $item_target['item'] != null){
        //     $dir .= "index/".$item_target['page']."/".$item_target['item']."/";
        // }            
        // else if($item_target['page'] != null && $item_target['item'] == null){
        //     $dir .= "page/".$item_target['page']."/";
        // }
        // else if($item_target['page'] == null && $item_target['item'] != null){
        //     $dir .= "item/".$item_target['item']."/";
        // }
        // else if($item_target['page'] == null && $item_target['item'] == null){
        //     $dir .= "none/";
        // }

        // if($target == "image"){
        //     $dir .= $item_target['id']."/";
        // }
        // else if($target == "title_image"){
        //     $dir .= $item_target['id']."/title/";
        // }

        // $new_dir = File::dirname($item[$target])."/";
        // $new_file_name = File::basename($item[$target]);

        // $old_dir = File::dirname($item_target[$target])."/";
        // $old_file_name = File::basename($item_target[$target]);

        // if($old_dir == '/upload/front/index/'.$dir && $old_dir.$old_file_name != $new_dir.$new_file_name){
        //     // 本身目錄
        //     File::delete(base_path()."/public".$old_dir.$old_file_name);
        //     $files = File::allFiles(base_path()."/public".$old_dir);
        //     if(count($files) == 0){
        //         rmdir(base_path()."/public".$old_dir);                        
        //     }
        // }

        // $refresh = Index::where(["id"=>$id])->update([$target=>$item[$target]]);
        // // dd($update);
        // // return;
        // if($refresh){
        //     $result = [
        //         'status' => 0,
        //         'msg' =>  '刷新成功!',
        //         'thumbnail' => $item[$target],
        //     ];
        // }
        // else{   
        //     $result = [
        //         'status' => 1,
        //         'msg' => '刷新失敗',
        //     ];
        // }
        // return $result;
    }

    


    //
    //图片上传
    public function item_upload($target, $item)
    {
        // $file = Input::file('index_file');
        // // dd($item);
        // // return;
        // $update;
        // $filepath;
        // if($file -> isValid()){
        //     //dd($file);
        //     $realPath = $file -> getRealPath();//临时文件的绝对路径
        //     $entension = $file -> getClientOriginalExtension();//上传文件的后缀
        //     // http://learningbyrecording.blogspot.tw/2015/01/php.html
        //     $name_origin = basename($file->getClientOriginalName(),'.'.$entension).'.'.$entension;
        //     $dir = "";
        //     if($item['page'] != null && $item['item'] != null){
        //         $dir .= "index/".$item['page']."/".$item['item']."/";
        //     }            
        //     else if($item['page'] != null && $item['item'] == null){
        //         $dir .= "page/".$item['page']."/";
        //     }
        //     else if($item['page'] == null && $item['item'] != null){
        //         $dir .= "item/".$item['item']."/";
        //     }
        //     else if($item['page'] == null && $item['item'] == null){
        //         $dir .= "none/";
        //     }

        //     if($target == "image"){
        //         $dir .= $item['id']."/";
        //     }
        //     else if($target == "title_image"){
        //         $dir .= $item['id']."/title/";
        //     }

        //     $item_target = Index::where(['id'=>$item['id']])->first();
        //     $old_dir;
        //     $old_file_name;

        //     if($target == "image"){
        //         $old_dir = File::dirname($item_target["image"])."/";
        //         $old_file_name = File::basename($item_target["image"]);
        //     }
        //     else if($target == "title_image"){
        //         $old_dir = File::dirname($item_target["title_image"])."/";
        //         $old_file_name = File::basename($item_target["title_image"]);
        //     }
        //     if($old_dir == '/upload/front/index/'.$dir){  
        //         // echo base_path()."/public".$old_dir.$old_file_name;
        //         // return ;     
        //         File::delete(base_path()."/public".$old_dir.$old_file_name);                
        //     }

        //     $path = $file->move(base_path().'/public/upload/front/index/'.$dir, $name_origin);
        //     $filepath = '/upload/front/index/'.$dir.$name_origin;
            
        //     $update = Index::where(['id'=>$item['id']])->update([$target => $filepath]);              
        // }     
        // // echo $update;
        // // return;
        // if($update){
        //     $result = [
        //         'status' => 0,
        //         'msg' =>  '更新成功!',
        //         'image' => $filepath,
        //     ];
        // }
        // else{   
        //     $result = [
        //         'status' => 1,
        //         'msg' => '更新失敗',
        //     ];
        // }
        // return $result;
        // // // http://blog.wentech.info/2014/08/jquery.html
        // // // http://www.muyesanren.com/2017/04/24/laravel-use-ajax-to-upload-file/   // *
        // // // http://www.codovel.com/ajax-image-upload-with-laravel-example.html
        // // // http://hayageek.com/docs/jquery-upload-file.php

        // // // 這會存到uploads/avatars
        // // // if ($request->ajax()) {
        // // //     $file = $request->file('myfile');
        // // //     // 第一个参数代表目录, 第二个参数代表我上方自己定义的一个存储媒介
        // // //    // dd($file);
        // // //     $path = $file->store('avatars', 'uploads');
        // // //     return response()->json(array('msg' => $path));
        // // // }
        
    }

    public function item_check_id($id)
    {
        // $id_list = Index::where(["id"=>$id]);
         
        // // dd($result);
        // // return;
        // if($id_list->count() == 0){
        //     $result = [
        //         'status' => 0,
        //         'msg' =>  'ID可以使用',
        //     ];
        // }
        // else{   
        //     $result = [
        //         'status' => 1,
        //         'msg' => 'ID已經存在',
        //     ];
        // }
        
        // return $result;          
    }
    public function item_enabled($index_dir, $id, $item){
        $update = true;
        
        if($item["enabled"] == "true"){
            $item["enabled"] = 1;
        }                 
        else{
            $item["enabled"] = 0;
        } 
        $update = List_::where(['id'=>$id])->update(['enabled'=>$item['enabled']]);   
        
        if($update){
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

    public function item_maintain($index_dir, $id, $item){
        $update = true;
        
        if($item["maintain"] == "true"){
            $item["maintain"] = 1;
        }                 
        else{
            $item["maintain"] = 0;
        }   
        $update = List_::where(['id'=>$id])->update(['maintain'=>$item['maintain']]);   
        
        if($update){
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
    public function item_create_database($index_dir, $item){
        $result;  
        $create;

        $link = 0;
        // --------------------------------------
        // 檢查是否有資料表
        $link = mysqli_connect('localhost', 'root', 'hahaha');
        
        $select_db = mysqli_select_db($link, $item['database_']);
        
        if (!$select_db) {
            // 沒有
        }
        else{
            mysqli_close($link);
            $result = [
                'status' => 1,
                'msg' => '資料庫存在',
            ];
            return $result;  
        }
       
        
        // -------------------------------------- 
        // 顯示資料庫名稱
        // https://stackoverflow.com/questions/838978/how-to-check-if-mysql-database-exists       
        $create = DB::statement('CREATE DATABASE '.$item['database_'].'; ');

        $create = DB::statement('CREATE TABLE '.$item['database_'].'.hahaha LIKE hahaha_front_device_content.hahaha; ');

        $create = DB::statement('CREATE TABLE '.$item['database_'].'.device LIKE hahaha_front_device_content.device; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.dir LIKE hahaha_front_device_content.dir; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.dir_item LIKE hahaha_front_device_content.dir_item; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.download LIKE hahaha_front_device_content.download; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.feature LIKE hahaha_front_device_content.feature; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.feature_item LIKE hahaha_front_device_content.feature_item; ');
        // $create = DB::statement('CREATE TABLE '.$item['database_'].'.feature_tree LIKE hahaha_front_device_content.feature_tree; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.future LIKE hahaha_front_device_content.future; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.history LIKE hahaha_front_device_content.history; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.index_ LIKE hahaha_front_device_content.index_; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.index_item LIKE hahaha_front_device_content.index_item; ');
        // $create = DB::statement('CREATE TABLE '.$item['database_'].'.index_tree LIKE hahaha_front_device_content.index_tree; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.new LIKE hahaha_front_device_content.new; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.other LIKE hahaha_front_device_content.other; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.overview LIKE hahaha_front_device_content.overview; ');
        $create = DB::statement('CREATE TABLE '.$item['database_'].'.overview_item LIKE hahaha_front_device_content.overview_item; ');
        // $create = DB::statement('CREATE TABLE '.$item['database_'].'.overview_tree LIKE hahaha_front_device_content.overview_tree; ');
        // 需要一個表一個表處理，目前沒有查到一次性指令

        // 建立識別項
        $device = new Device();

        $table = $item['database_'].'.hahaha';        
        $device->setTable($table); 

        $device->create(['device'=>1]);
        
        $result = [
            'status' => 0,
            'msg' => '資料表建立!',
        ];
        return $result;  
    }

    public function item_drop_database($index_dir, $item){  
        $result;  
        $create;

        $link = 0;
        // --------------------------------------
        // 檢查是否有資料表
        $link = mysqli_connect('localhost', 'root', 'hahaha');
        
        $select_db = mysqli_select_db($link, $item['database_']);
        
        if (!$select_db) {
            // 沒有
            mysqli_close($link);
            $result = [
                'status' => 1,
                'msg' => '資料庫不存在',
            ];
            return $result; 
        }
        else{
             
        }
       
        
        // -------------------------------------- 
        // 顯示資料庫名稱
        // https://stackoverflow.com/questions/838978/how-to-check-if-mysql-database-exists  
        $create = DB::statement('DROP DATABASE '.$item['database_'].'; ');

        $result = [
            'status' => 0,
            'msg' => '已丟棄!',
        ];
        return $result; 
    }

    public function item_find_database($index_dir, $item){  
        // 找到資料庫的相對應資料
        $device = new Device();

        // dd(count($data_list));

        $image = "";
        // dd($data_list[$i]['database_']);         
        $table = $item['database_'].'.device';  
            
        // --------------------------------------
        // 檢查是否有資料表
        $link = mysqli_connect('localhost', 'root', 'hahaha');
        
        $select_db = mysqli_select_db($link, $item['database_']);
        
        if (!$select_db) {
            // 沒有
            $image = "#";
            // return view('web.backend.product.list.edit', compact('item', 'image'));  
            // return "資料庫不存在";
        }
        else{
            // 檢查表
            // https://stackoverflow.com/questions/6432178/how-can-i-check-if-a-mysql-table-exists-with-php
            $is_device = mysqli_query($link, 'select 1 from hahaha LIMIT 1');
            if($is_device){
                $device->setTable($table);             
                $data = $device->where(['item'=>'Device'])->first();   
                $image = $data['image'];
            }
            else{
                $image = "#";
                // return view('web.backend.product.list.edit', compact('item', 'image'));  
                // return "不相容的資料庫";
            }
        }        
        // --------------------------------------     
        
        $result = [
            'status' => 0,
            'msg' => '已找到!',
            'image'=> $image,
        ];
        return $result; 
    }
    // -------------------------------------------------------------------------------------
    public function item_item($index_dir, $input)
    {  
        // $method = $input['method'];
        // $item = $input["item"];
        // $item_item = $input["item_item"];
        // $result;

        // if($method == "items"){    
        //     // 查詢項目        
        //     $id = $input["id"];
        //     $result = $this->item_item_items($id);
        // }
        // else if($method == "all_update"){
        //     $result = $this->item_item_all_update($id, $item_item);
        // }
        // //        
        // else if($method == "add"){            
        //     $id = $input["id"];
        //     $result = $this->item_item_add($id);
        // }
        // else if($method == "delete"){
        //     $id = $input["id"];
        //     $no = $input["no"];
        //     $result = $this->item_item_delete($id, $no);
        // }
        // else if($method == "update"){
        //     $id = $input["id"];
        //     $no = $input["no"];
        //     $result = $this->item_item_update($id, $no, $item_item);
        // }
        // //
        // else if($method == "upload"){
        //     $target = $input["target"];
        //     $result = $this->item_item_upload($target, $item, $item_item);
        // }
        
        // return $result;
    }

    public function item_item_items($id){    
        // $items = null;
        // $items = Item::where(['id'=>$id])->orderBy('order_', 'asc')->orderBy('item', 'asc')->get();
        
        // if($items){            
        //     $result = [
        //         'status' => 0,
        //         'msg' =>  'ID可以使用',
        //         'items'=> $items,
        //     ];
        // }
        // else{   
        //     $result = [
        //         'status' => 1,
        //         'msg' => 'ID已經存在',
        //     ];
        // }
        // return $result;
    }

    public function item_item_all_update($id, $item_item){
        // $update = true;
        // for($i = 0; $i < count($id); $i++){
        //     $update &= Index::where(['id' => $id, 'no' => $no])->update($item_item[$i]);
        // }
        // if($update){
        //     $result = [
        //         'status' => 0,
        //         'msg' => '更新成功!',
        //     ];
        // }
        // else{   
        //     $result = [
        //         'status' => 1,
        //         'msg' => '更新失敗',
        //     ];
        // }
        // return $result;
    }

    public function item_item_add($id){        
        // $ok = Item::create(['id' => $id]);
        // // dd($item);
        
        // if($ok){
        //     $item = Item::where(['no' => $ok['no']])->first();
        //     $result = [
        //         'status' => 0,
        //         'msg' =>  'ID可以使用',
        //         'item'=> $item,
        //     ];
        // }
        // else{   
        //     $result = [
        //         'status' => 1,
        //         'msg' => 'ID已經存在',
        //     ];
        // }
        // return $result;
    }

    public function item_item_delete($id, $no){        
        // $ok = Item::where(['id' => $id, 'no' => $no])->delete();
        // if($ok){            
        //     $result = [
        //         'status' => 0,
        //         'msg' =>  'Item已刪除',
        //     ];
        // }
        // else{   
        //     $result = [
        //         'status' => 1,
        //         'msg' => 'Item刪除失敗',
        //     ];
        // }
        // return $result;   
    }

    public function item_item_update($id, $no, $item_item){

        // if(!empty($item_item['image'])){
        //     $item_target = Index::where(['id'=>$id])->first();
        //     $item_item_target = Item::where(['id' => $id, 'no' => $no])->first();
        //     $old_dir;
        //     $old_file_name;
            
        //     $dir = "";
        //     if($item_target['page'] != null && $item_target['item'] != null){
        //         $dir .= "index/".$item_target['page']."/".$item_target['item']."/";
        //     }            
        //     else if($item_target['page'] != null && $item_target['item'] == null){
        //         $dir .= "page/".$item_target['page']."/";
        //     }
        //     else if($item_target['page'] == null && $item_target['item'] != null){
        //         $dir .= "item/".$item_target['item']."/";
        //     }
        //     else if($item_target['page'] == null && $item_target['item'] == null){
        //         $dir .= "none/";
        //     }

        //     if($item_item['image'] != null){
        //         $dir .= $item_target['id']."/".$no."/";
        //     }

        //     $new_dir = File::dirname($item_item["image"])."/";
        //     $new_file_name = File::basename($item_item["image"]);

        //     $old_dir = File::dirname($item_item_target["image"])."/";
        //     $old_file_name = File::basename($item_item_target["image"]);
        //     //echo $old_dir;
           
        //     if($old_dir == '/upload/front/index/'.$dir && $old_dir.$old_file_name != $new_dir.$new_file_name){                
        //         // 本身目錄
        //         File::delete(base_path()."/public".$old_dir.$old_file_name);
        //         $files = File::allFiles(base_path()."/public".$old_dir);
        //         if(count($files) == 0){
        //             rmdir(base_path()."/public".$old_dir);                        
        //         }
        //     }
        // }
        
        // $update = null;
        // $update = Item::where(['id' => $id, 'no' => $no])->update($item_item);
       
        // if($update){
        //     $result = [
        //         'status' => 0,
        //         'msg' => '更新成功!',
        //     ];
        // }
        // else{   
        //     $result = [
        //         'status' => 1,
        //         'msg' => '更新失敗',
        //     ];
        // }
        // return $result;
    }

    //--------------------------------------------------------------------------   

    public function item_item_upload($target, $item, $item_item){
        // $file = Input::file('index_file');
        // // dd($item);
        // // return;
        // $update;
        // $filepath;
        // if($file -> isValid()){
        //     //dd($file);
        //     $realPath = $file -> getRealPath();//临时文件的绝对路径
        //     $entension = $file -> getClientOriginalExtension();//上传文件的后缀
        //     // http://learningbyrecording.blogspot.tw/2015/01/php.html
        //     $name_origin = basename($file->getClientOriginalName(),'.'.$entension).'.'.$entension;
        //     $dir = "";
        //     if($item['page'] != null && $item['item'] != null){
        //         $dir .= "index/".$item['page']."/".$item['item']."/";
        //     }            
        //     else if($item['page'] != null && $item['item'] == null){
        //         $dir .= "page/".$item['page']."/";
        //     }
        //     else if($item['page'] == null && $item['item'] != null){
        //         $dir .= "item/".$item['item']."/";
        //     }
        //     else if($item['page'] == null && $item['item'] == null){
        //         $dir .= "none/";
        //     }
        //     if($target == "image"){
        //         $dir .= $item['id']."/".$item_item['no']."/";
        //     }

        //     if(!File::isDirectory(base_path().'/public/upload/front/index/'.$dir)){
        //         File::makeDirectory(base_path().'/public/upload/front/index/'.$dir, 0775, true);
        //     }   
            
        //     $item_item_target = Item::where(['id'=>$item['id'], 'no'=>$item_item['no']])->first();
        //     $old_dir;
        //     $old_file_name;

        //     if($target == "image"){
        //         $old_dir = File::dirname($item_item_target["image"])."/";
        //         $old_file_name = File::basename($item_item_target["image"]);
        //     }
            
        //     if($old_dir == '/upload/front/index/'.$dir){  
        //         // echo base_path()."/public".$old_dir.$old_file_name;
        //         // return ;     
        //         File::delete(base_path()."/public".$old_dir.$old_file_name);
        //     }

        //     $path = $file->move(base_path().'/public/upload/front/index/'.$dir, $name_origin);
        //     $filepath = '/upload/front/index/'.$dir.$name_origin;
            
        //     $update = Item::where(['id'=>$item['id'], 'no'=>$item_item['no']])->update([$target => $filepath]);              
        // }     
        // // echo $update;
        // // return;
        // if($update){
        //     $result = [
        //         'status' => 0,
        //         'msg' =>  '更新成功!',
        //         'image' => $filepath,
        //     ];
        // }
        // else{   
        //     $result = [
        //         'status' => 1,
        //         'msg' => '更新失敗',
        //     ];
        // }
        // return $result;
    }

    
}
