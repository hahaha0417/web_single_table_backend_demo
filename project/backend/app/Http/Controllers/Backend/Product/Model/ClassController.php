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
namespace App\Http\Controllers\Backend\Product\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
// 
use App\Http\Models\Front\Product\List_;
use App\Http\Models\Front\Product\All\Product;
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
class ClassController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($dir)
    {
        // 資料庫畫面欄位原則上不建立在此頁面，因為使用者通常不會沒事同時修改多個Index資料庫
        // 可以建立在 http://114.32.144.211:8081/backend 的選單或該頁面的某個iframe頁面上

        $item = List_::where(['class'=>$dir[0], 'model'=>$dir[1]])->first();

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
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

        $data_count = 10;  
        $block_list = $product->select("block")->distinct()->orderBy('block', 'asc')->get();        
        $item_list = $product->select("item")->distinct()->orderBy('item', 'asc')->get();
        $data_list = $product->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('name', 'asc')->paginate($data_count)->appends(request()->query());
        
        // // 去除重複的資料
        // // distinct()
        
        // // dd($data_list);
        // // return;

        // //
        return view('web.backend.product.model.class.index', compact('block_list', 'item_list', 'data_list'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($dir)
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
    public function store($dir)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dir, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dir, $id)
    {       
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 
    
        $data_count = 10;  

        $block_auto_complete_tag = $product->select("block")->distinct()->orderBy('block', 'asc')->get();
        $item_auto_complete_tag = $product->select("item")->distinct()->orderBy('item', 'asc')->get();
        $item = $product->where(['id'=>$id])->first();   

        // // 去除重複的資料
        // // distinct()
        
        // // dd($data_list);
        // // return;

        // //
        return view('web.backend.product.model.class.edit', compact('dir', 'item', 'block_auto_complete_tag', 'item_auto_complete_tag')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($dir, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($dir, $id)
    {
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

        $item = $product->where(['id'=>$id])->first();
        
        $dir1 = "";

        $item_block_dir = "";
        $item_item_dir = "";
        {
            //             
            if($item['block'] != null && $item['item'] != null){
                $dir1 .= "class/class/".$item['block']."/".$item['item']."/";
                $item_block_dir = "class/class/".$item['block']."/";
                $item_item_dir = "class/class/".$item['block']."/".$item['item']."/";
            }            
            else if($item['block'] != null && $item['item'] == null){
                $dir1 .= "class/block/".$item['block']."/";
                $item_block_dir = "class/block/".$item['block']."/";                
            }
            else if($item['block'] == null && $item['item'] != null){
                $dir1 .= "class/item/".$item['item']."/";
                $item_item_dir = "class/item/".$item['item']."/";
            }
            else if($item['block'] == null && $item['item'] == null){
                $dir1 .= "class/none/";
            }
            $dir1 .= $item['id']."/";            
        }
                     
        $item_dir = '/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1;
        $delete = true;  
                
        {   
            if(File::isDirectory(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1)){                
                // 清掉原有資料夾(id)
                File::deleteDirectory(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1);
                // 上兩層路徑是否為空
                if($item_block_dir != "" && $item_item_dir != ""){
                    $files_item = File::allFiles(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_item_dir);
                    if(count($files_item) == 0){                    
                        rmdir(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_item_dir);
                        $files_block = File::allFiles(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_block_dir);
                        if(count($files_block) == 0){
                            rmdir(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_block_dir);                        
                        }
                        else if(count($files_block) == 1){
                            // 似乎是刪不掉

                            // 由於刪除後可能檔案系統有紀錄，所以不一定等於0，要另外做處理                                
                            // if(!$files_block[0]->isDir() && !$files_block[0]->isFile()){
                            //     rmdir(base_path().'/public/upload/front/product/'.$item_block_temp_dir); 
                            // }
                        }
                    }
                }
                else if($item_block_dir != "" && $item_item_dir == ""){
                    $files_block = File::allFiles(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_block_dir);
                    if(count($files_block) == 0){
                        rmdir(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_block_dir);                        
                    }                    
                }
                else if($item_block_dir == "" && $item_item_dir != ""){
                    $files_item = File::allFiles(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_item_dir);
                    if(count($files_item) == 0){
                        rmdir(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_item_dir);                    
                    }
                }
                else if($item_block_dir == "" && $item_item_dir == ""){

                }      
            }      
       
            $delete &= $product->where(["id"=>$id])->delete();            
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

    public function deal($dir)
    {
        $input = Input::except('_token','_method');
        $deal = $input["deal"];
        $method = $input['method'];
        if($deal == 'item'){
            $result = $this->item($dir, $input);
        }
        else if($deal == 'item_item'){
            $result = $this->item_item($dir, $input);
        }
        // else if($deal == 'operate'){
        //     // 跨id處理資料
        //     // $result = $this->operate($input);
        // }
        // //
        else if($deal == '' && $method == 'all_update'){
            $item = $input["item"];
            $item_item = $input["item_item"];
            $result = $this->all_update($dir, $item, $item_item);
        }

        return $result;
    }
    // -------------------------------------------------------------------------------------
    public function all_update($item, $item_item)
    { 

    }
    // -------------------------------------------------------------------------------------
    // item 動作
    public function item($dir, $input)
    { 
        $method = $input['method'];
        $item = $input["item"];
        $result;
        // dd($item);
        
        if($method == "add"){
            $result = $this->item_add($dir, $item);
        }
        // else if($method == "add_index"){
        //     $result = $this->item_add_index($item);
        // }
        // else if($method == "add_nav"){
        //     $result = $this->item_add_nav($item);
        // }
        else if($method == "select_delete"){
            $id = $input["id"];
            $result = $this->item_select_delete($dir, $id);
        }
        else if($method == "update"){
            $id = $input["id"];
            $result = $this->item_update($dir, $id, $item);
        }
        else if($method == "all_save"){            
            $result = $this->item_all_save($dir, $item);
        }
        else if($method == "order"){
            $id = $input["id"];
            $result = $this->item_order($dir, $id, $item);
        }
        else if($method == "block_item_id_update"){
            $id = $input["id"];
            $result = $this->item_block_item_id_update($dir, $id, $item);
        }
        else if($method == "image_refresh"){
            $id = $input["id"];
            $target = $input["target"];
            $result = $this->item_image_refresh($dir, $target, $id, $item);
        }
        else if($method == "upload"){
            $target = $input["target"];
            $result = $this->item_upload($dir, $target, $item);
        }
        else if($method == "check_id"){
            $id = $input["id"];
            $result = $this->item_check_id($dir, $id);
        }

        return $result;
    }    

    public function item_add($dir, $item)
    {
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

        $find = $product->where(["id"=>$item["id"]])->first();
        
        $input = Input::except('_token','_method');
        $item_id = null;
        $ok = null;
        if(!$find)
        {            
            if(!$find){
                $ok = $product->create($item);
                $item_id = $product->where(["id"=>$item["id"]])->first();
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

    public function item_select_delete($dir, $id){
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

        $delete = true;
        for($i = 0; $i < count($id); $i++){

            $item = $product->where(['id'=>$id[$i]])->first();
        
            $dir = "";

            $item_class_dir = "";
            $item_item_dir = "";
            {
                //             
                if($item['block'] != null && $item['item'] != null){
                    $dir .= "class/class/".$item['block']."/".$item['item']."/";
                    $item_class_dir = "class/class/".$item['block']."/";
                    $item_item_dir = "class/class/".$item['block']."/".$item['item']."/";
                }            
                else if($item['block'] != null && $item['item'] == null){
                    $dir .= "class/class/".$item['block']."/";
                    $item_class_dir = "class/class/".$item['block']."/";                
                }
                else if($item['block'] == null && $item['item'] != null){
                    $dir .= "class/item/".$item['item']."/";
                    $item_item_dir = "class/item/".$item['item']."/";
                }
                else if($item['block'] == null && $item['item'] == null){
                    $dir .= "class/none/";
                }
                $dir .= $item['id']."/";            
            }
                        
            $item_dir = '/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir;
            $delete;        
            {   
                if(File::isDirectory(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir)){                
                    // 清掉原有資料夾(id)
                    File::deleteDirectory(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir);
                    // 上兩層路徑是否為空
                    if($item_class_dir != "" && $item_item_dir != ""){
                        $files_item = File::allFiles(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_item_dir);
                        if(count($files_item) == 0){                    
                            rmdir(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_item_dir);
                            $files_class = File::allFiles(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_class_dir);
                            if(count($files_class) == 0){
                                rmdir(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_class_dir);                        
                            }
                            else if(count($files_class) == 1){
                                // 似乎是刪不掉

                                // 由於刪除後可能檔案系統有紀錄，所以不一定等於0，要另外做處理                                
                                // if(!$files_class[0]->isDir() && !$files_class[0]->isFile()){
                                //     rmdir(base_path().'/public/upload/front/index/'.$item_class_temp_dir); 
                                // }
                            }
                        }
                    }
                    else if($item_class_dir != "" && $item_item_dir == ""){
                        $files_class = File::allFiles(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_class_dir);
                        if(count($files_class) == 0){
                            rmdir(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_class_dir);                        
                        }
                    }
                    else if($item_class_dir == "" && $item_item_dir != ""){
                        $files_item = File::allFiles(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_item_dir);
                        if(count($files_item) == 0){
                            rmdir(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$item_item_dir);                    
                        }
                    }
                    else if($item_class_dir == "" && $item_item_dir == ""){

                    }      
                }     
            }

            $delete &= $product->where(['id'=>$id[$i]])->delete();
            // $delete &= Item::where(["id"=>$id[$i]])->delete();  
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

    public function item_update($dir, $id, $item){
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

        $update = null;
        $update = $product->where(['id' => $id])->update($item);
       
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

    public function item_all_save($dir, $item){
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 
        
        $delete = true;
        for($i = 1; $i <= count($item); $i++){
            $delete &= $product->where(['id'=>$item[$i]["id"]])->update($item[$i]);            
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

    public function item_order($dir, $id, $item)
    {
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

        $update = $product->where(["id"=>$id])->update(["order_"=>$item["order_"]]);
         
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

    public function item_block_item_id_update($dir, $id, $item)
    {
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

        $product_item = new Product();

        $table1 = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class_item';        
        $product_item->setTable($table1); 
        
        if(!empty($item['id']) && $item['id'] == ''){
            return $result = [
                'status' => 1,
                'msg' => '更新失敗',
            ];
        }
        if(!empty($item['id'])){
            $find = $product->where(["id"=>$item['id']])->first();
            if($find){
                return $result = [
                    'status' => 1,
                    'msg' => '更新失敗',
                ];
            }
        }

        $item_temp = $product->where(["id"=>$id])->first();
        $dir1_temp = "";
        $dir1 = "";
        
        $item_block_temp_dir = "";
        $item_item_temp_dir = "";
        {
            //             
            if($item_temp['block'] != null && $item_temp['item'] != null){
                $dir1_temp .= "class/class/".$item_temp['block']."/".$item_temp['item']."/";
                $item_block_temp_dir = "class/class/".$item_temp['block']."/";
                $item_item_temp_dir = "class/class/".$item_temp['block']."/".$item_temp['item']."/";
            }            
            else if($item_temp['block'] != null && $item_temp['item'] == null){
                $dir1_temp .= "class/block/".$item_temp['block']."/";
                $item_block_temp_dir = "class/block/".$item_temp['block']."/";                
            }
            else if($item_temp['block'] == null && $item_temp['item'] != null){
                $dir1_temp .= "class/item/".$item_temp['item']."/";
                $item_item_temp_dir = "class/item/".$item_temp['item']."/";
            }
            else if($item_temp['block'] == null && $item_temp['item'] == null){
                $dir1_temp .= "class/none/";
            }
            $dir1_temp .= $item_temp['id']."/";            
        }

        {
            if(!empty($item['block'])){
                if($dir1 == "" && $item['block'] != null){
                    $dir1 .= "class/class/".$item['block']."/";
                }            
                else if($dir1 == "" && $item['block'] == null){
                    $dir1 .= "class/block/".$item['block']."/";
                }
            }
            else{
                if($dir1 == "" && $item_temp['block'] != null){
                    $dir1 .= "class/class/".$item_temp['block']."/";
                }            
                else if($dir1 == "" && $item_temp['block'] == null){
                    $dir1 .= "class/block/".$item_temp['block']."/";
                }
            }

            if(!empty($item['item'])){
                if($dir1 != "" && $item['item'] != null){
                    $dir1 .= $item['item']."/";
                }            
                else if($dir1 != "" && $item['item'] == null){
                    
                }
                else if($dir1 == "" && $item['item'] != null){
                    $dir1 .= "class/item/".$item['item']."/";
                }            
                else if($dir == "" && $item['item'] == null){
                    $dir1 .= "class/none/";
                }
            }
            else{
                if($dir1 != "" && $item_temp['item'] != null){
                    $dir1 .= $item_temp['item']."/";
                }            
                else if($dir1 != "" && $item_temp['item'] == null){
                    
                }
                else if($dir1 == "" && $item_temp['item'] != null){
                    $dir1 .= "class/item/".$item_temp['item']."/";
                }            
                else if($dir1 == "" && $item_temp['item'] == null){
                    $dir1 .= "class/none/";
                }
            }

            if(!empty($item['id'])){
                $dir1 .= $item['id']."/";
            }
            else{
                $dir1 .= $item_temp['id']."/";
            }                      
        }
           
        $update = true;

        // https://laravel.com/docs/5.6/facades
        // http://php.net/manual/zh/ref.filesystem.php            
        $image_temp_dir = File::dirname($item_temp["image"])."/";
        $image_temp_file_name = File::basename($item_temp["image"]);

        $title_image_temp_dir = File::dirname($item_temp["title_image"])."/";
        $title_image_temp_file_name = File::basename($item_temp["title_image"]);
        
        $item_temp_dir = '/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1_temp;
        $item_dir = '/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1;
        
        if($item_temp_dir == $item_dir){
            // 圖片路徑沒有更動
        }
        else{            
            // 路徑更動
            if(!File::isDirectory(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1)){
                File::makeDirectory(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1, 0775, true);
            }   
            
            File::moveDirectory(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1_temp, base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1, true);
            
            if($item_block_temp_dir != "" && $item_item_temp_dir != ""){
                if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_item_temp_dir)){    
                    $files_item = File::allFiles(base_path().'/public/upload/front/index/'.$item_item_temp_dir);
                   
                    if(count($files_item) == 0){   
                        rmdir(base_path().'/public/upload/front/index/'.$item_item_temp_dir);
                        
                        if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_block_temp_dir)){  
                            $files_block = File::allFiles(base_path().'/public/upload/front/index/'.$item_block_temp_dir);
                                                                
                            if(count($files_block) == 0){
                                rmdir(base_path().'/public/upload/front/index/'.$item_block_temp_dir); 
                            }
                            else if(count($files_block) == 1){
                                // 似乎是刪不掉

                                // 由於刪除後可能檔案系統有紀錄，所以不一定等於0，要另外做處理                                
                                // if(!$files_block[0]->isDir() && !$files_block[0]->isFile()){
                                //     rmdir(base_path().'/public/upload/front/index/'.$item_block_temp_dir); 
                                // }
                            }
                        }                       
                    }
                }
                
                
            }
            else if($item_block_temp_dir != "" && $item_item_temp_dir == ""){
                if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_item_temp_dir)){  
                    $files_block = File::allFiles(base_path().'/public/upload/front/index/'.$item_block_temp_dir);
                
                    if(count($files_block) == 0){
                        rmdir(base_path().'/public/upload/front/index/'.$item_item_temp_dir);                  
                    }
                }
            }
            else if($item_block_temp_dir == "" && $item_item_temp_dir != ""){
                if(File::isDirectory(base_path().'/public/upload/front/index/'.$item_item_temp_dir)){  
                    $files_item = File::allFiles(base_path().'/public/upload/front/index/'.$item_item_temp_dir);
                
                    if(count($files_item) == 0){
                        rmdir(base_path().'/public/upload/front/index/'.$item_item_temp_dir); 
                    }
                }
            }
            else if($item_block_temp_dir == "" && $item_item_temp_dir == ""){

            }      
            
            if($image_temp_dir == $item_temp_dir){
                $item_temp["image"] = $item_dir.$image_temp_file_name;
            }
            if($title_image_temp_dir == $item_temp_dir){
                $item_temp["title_image"] = $item_dir.$title_image_temp_file_name;
            }
            if(!empty($item['block'])){
                $item_temp['block'] = $item['block'];
            }
            if(!empty($item['item'])){
                $item_temp['item'] = $item['item'];
            }
            if(!empty($item['id'])){
                $item_temp['id'] = $item['id'];
            }

            
            
            $item_item_temp = $product_item->where(["id"=>$id])->get();
            
            for($i = 0; $i < count($item_item_temp); $i++){
                $modify = false;
                $item_item_image = $item_item_temp[$i]['image'];
                $item_item_image_temp_dir = File::dirname($item_item_temp[$i]['image'])."/";
                $item_item_image_temp_file_name = File::basename($item_item_temp[$i]['image']);
                  
                if($item_item_image_temp_dir == '/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1_temp.$item_item_temp[$i]['no'].'/' &&
                $item_item_temp[$i]['image'] != $item_dir.$item_item_temp[$i]['no'].'/'.$item_item_image_temp_file_name){                    
                    $item_item_temp[$i]['image'] = $item_dir.$item_item_temp[$i]['no'].'/'.$item_item_image_temp_file_name;
                    
                    $modify = true;
                }
                if(!empty($item['id']) && $item_item_temp[$i]['id'] != $item['id']){
                    $item_item_temp[$i]['id'] = $item['id'];
                    $modify = true;
                }      
                if($modify == true){
                    $update &= $product_item->where(["id"=>$id, "no"=>$item_item_temp[$i]['no']])->update($item_item_temp[$i]->toArray());
                }      
            }
            $update &= $product->where(["id"=>$id])->update($item_temp->toArray());
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

    public function item_image_refresh($dir, $target, $id, $item)
    {
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

        $item_target = $product->where(['id'=>$id])->first();
        $old_dir;
        $old_file_name;
        
        $dir1 = "";
        if($item_target['block'] != null && $item_target['item'] != null){
            $dir1 .= "class/class/".$item_target['block']."/".$item_target['item']."/";
        }            
        else if($item_target['block'] != null && $item_target['item'] == null){
            $dir1 .= "class/block/".$item_target['block']."/";
        }
        else if($item_target['block'] == null && $item_target['item'] != null){
            $dir1 .= "class/item/".$item_target['item']."/";
        }
        else if($item_target['block'] == null && $item_target['item'] == null){
            $dir1 .= "class/none/";
        }

        if($target == "image"){
            $dir1 .= $item_target['id']."/";
        }
        else if($target == "title_image"){
            $dir1 .= $item_target['id']."/title/";
        }

        $new_dir = File::dirname($item[$target])."/";
        $new_file_name = File::basename($item[$target]);

        $old_dir = File::dirname($item_target[$target])."/";
        $old_file_name = File::basename($item_target[$target]);

        if($old_dir == '/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1 && $old_dir.$old_file_name != $new_dir.$new_file_name){
            // 本身目錄
            File::delete(base_path()."/public".$old_dir.$old_file_name);
            $files = File::allFiles(base_path()."/public".$old_dir);
            if(count($files) == 0){
                rmdir(base_path()."/public".$old_dir);                        
            }
        }

        $refresh = $product->where(["id"=>$id])->update([$target=>$item[$target]]);
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
    public function item_upload($dir, $target, $item)
    {
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

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
            $dir1 = "";
            if($item['block'] != null && $item['item'] != null){
                $dir1 .= "class/class/".$item['block']."/".$item['item']."/";
            }            
            else if($item['block'] != null && $item['item'] == null){
                $dir1 .= "class/block/".$item['block']."/";
            }
            else if($item['block'] == null && $item['item'] != null){
                $dir1 .= "class/item/".$item['item']."/";
            }
            else if($item['block'] == null && $item['item'] == null){
                $dir1 .= "class/none/";
            }

            if($target == "image"){
                $dir1 .= $item['id']."/";
            }
            else if($target == "title_image"){
                $dir1 .= $item['id']."/title/";
            }

            $item_target = $product->where(['id'=>$item['id']])->first();
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
            if($old_dir == '/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1){  
                // echo base_path()."/public".$old_dir.$old_file_name;
                // return ;     
                File::delete(base_path()."/public".$old_dir.$old_file_name);                
            }

            $path = $file->move(base_path().'/public/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1, $name_origin);
            $filepath = '/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1.$name_origin;
            
            $update = $product->where(['id'=>$item['id']])->update([$target => $filepath]);              
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

    public function item_check_id($dir, $id)
    {
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

        $id_list = $product->where(["id"=>$id]);
         
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
    public function item_item($dir, $input)
    {  
        $method = $input['method'];
        $item = $input["item"];
        $item_item = $input["item_item"];
        $result;

        if($method == "items"){    
            // 查詢項目        
            $id = $input["id"];
            $result = $this->item_item_items($dir, $id);
        }
        else if($method == "all_update"){
            $result = $this->item_item_all_update($dir, $id, $item_item);
        }
        //        
        else if($method == "add"){            
            $id = $input["id"];
            $result = $this->item_item_add($dir, $id);
        }
        else if($method == "delete"){
            $id = $input["id"];
            $no = $input["no"];
            $result = $this->item_item_delete($dir, $id, $no);
        }
        else if($method == "update"){
            $id = $input["id"];
            $no = $input["no"];
            $result = $this->item_item_update($dir, $id, $no, $item_item);
        }
        //
        // else if($method == "upload"){
        //     $target = $input["target"];
        //     $result = $this->item_item_upload($target, $item, $item_item);
        // }
        
        return $result;
    }

    public function item_item_items($dir, $id){ 
        $product_item = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class_item';        
        $product_item->setTable($table); 

        $items = null;
        $items = $product_item->where(['id'=>$id])->orderBy('order_', 'asc')->orderBy('item', 'asc')->get();
        
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

    public function item_item_all_update($dir, $id, $item_item){
        $product_item = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.model_item';        
        $product_item->setTable($table); 

        $update = true;
        for($i = 0; $i < count($id); $i++){
            $update &= $product_item->where(['id' => $id, 'no' => $no])->update($item_item[$i]);
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

    public function item_item_add($dir, $id){ 
        $product_item = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class_item';        
        $product_item->setTable($table); 

        $ok = $product_item->create(['id' => $id]);
        // dd($item);
        
        if($ok){
            $item = $product_item->where(['no' => $ok['no']])->first();
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

    public function item_item_delete($dir, $id, $no){  
        $product_item = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class_item';        
        $product_item->setTable($table); 

        $ok = $product_item->where(['id' => $id, 'no' => $no])->delete();
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

    public function item_item_update($dir, $id, $no, $item_item){
        $product = new Product();

        $table = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class';        
        $product->setTable($table); 

        $product_item = new Product();

        $table1 = 'hahaha_front_product_'.$dir[0].'_'.$dir[1].'.class_item';        
        $product_item->setTable($table1); 

        if(!empty($item_item['image'])){
            $item_target = $product->where(['id'=>$id])->first();
            $item_item_target = $product_item->where(['id' => $id, 'no' => $no])->first();
            $old_dir;
            $old_file_name;
            
            $dir1 = "";
            if($item_target['block'] != null && $item_target['item'] != null){
                $dir1 .= "class/class/".$item_target['block']."/".$item_target['item']."/";
            }            
            else if($item_target['block'] != null && $item_target['item'] == null){
                $dir1 .= "class/block".$item_target['block']."/";
            }
            else if($item_target['block'] == null && $item_target['item'] != null){
                $dir1 .= "class/item/".$item_target['item']."/";
            }
            else if($item_target['block'] == null && $item_target['item'] == null){
                $dir1 .= "class/none/";
            }

            if($item_item['image'] != null){
                $dir1 .= $item_target['id']."/".$no."/";
            }

            $new_dir = File::dirname($item_item["image"])."/";
            $new_file_name = File::basename($item_item["image"]);

            $old_dir = File::dirname($item_item_target["image"])."/";
            $old_file_name = File::basename($item_item_target["image"]);
            //echo $old_dir;
           
            if($old_dir == '/upload/front/product/'.$dir[0].'/'.$dir[1].'/'.$dir1 && $old_dir.$old_file_name != $new_dir.$new_file_name){                
                // 本身目錄
                File::delete(base_path()."/public".$old_dir.$old_file_name);
                $files = File::allFiles(base_path()."/public".$old_dir);
                if(count($files) == 0){
                    rmdir(base_path()."/public".$old_dir);                        
                }
            }
        }
        
        $update = null;
        $update = $product_item->where(['id' => $id, 'no' => $no])->update($item_item);
       
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
        //     if($item['class'] != null && $item['item'] != null){
        //         $dir .= "index/".$item['class']."/".$item['item']."/";
        //     }            
        //     else if($item['class'] != null && $item['item'] == null){
        //         $dir .= "class/".$item['class']."/";
        //     }
        //     else if($item['class'] == null && $item['item'] != null){
        //         $dir .= "class/item/".$item['item']."/";
        //     }
        //     else if($item['class'] == null && $item['item'] == null){
        //         $dir .= "class/none/";
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
