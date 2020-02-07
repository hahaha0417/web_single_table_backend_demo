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
namespace App\Http\Controllers\Backend\Index;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Models\Front\Index\Index_ as Index;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Config;


// 由於業務已經整併進Index，Initial有需要再啟用
class InitialController extends CommonController
{
    //
    public function __construct()
    {
        
    }

    // 由於可能會分開寫，ajax分開處理
    public function index($page = "index")
    {      
        // $index = Input::get('i_index', 'all');
        // $page = Input::get('i_page', 'all');
        // $item = Input::get('i_item', 'all');
        
        // $data_count = 10;

        // $index_list;
        // $page_list;
        // $item_list;        
        // $data_list;
        
        // if($index == "all" && $page == "all" && $item == "all"){
        //     $index_list = Index::where(["page" => "root", "item" => "index"])->distinct()->orderBy('order_', 'asc')->get();
        //     $page_list = Index::select("page")->distinct()->orderBy('page', 'asc')->get();
        //     $item_list = Index::select("item")->distinct()->orderBy('item', 'asc')->get();
        //     $data_list = Index::orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        // }
        // else if($index != "all" && $page == "all" && $item == "all"){
        //     $index_list = Index::where(["page" => "root", "item" => "index"])->where(["title_name" => $index])->distinct()->orderBy('order_', 'asc')->get();
        //     $page_list = Index::where(["page" => $index, "item" => "nav"])->orderBy('page', 'asc')->get();
        //     $item_list = Index::select("item")->where(["page" => $index])->distinct()->orderBy('item', 'asc')->get();
        //     $data_list = Index::where(["page" => $index])->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        // }
        // else if($index == "all" && $page != "all" && $item == "all"){
        //     $index_list = Index::where(["page" => "root", "item" => "index"])->distinct()->orderBy('page', 'asc')->get();
        //     $page_list = Index::select("page")->distinct()->orderBy('page', 'asc')->get();
        //     $item_list = Index::select("item")->where(["page" => $page])->distinct()->orderBy('item', 'asc')->get();
        //     $data_list = Index::where(["page" => $page])->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        // }
        // else if($index != "all" && $page != "all" && $item == "all"){
        //     $index_list = Index::where(["page" => "root", "item" => "index"])->where(["title_name" => $index])->distinct()->orderBy('order_', 'asc')->get();
        //     $page_list = Index::where(["page" => $index, "item" => "nav"])->orderBy('page', 'asc')->get();            
        //     $item_list = Index::select("item")->where(["page" => $index, "page" => $page])->distinct()->orderBy('item', 'asc')->get();
        //     $data_list = Index::where(["page" => $page])->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        // }
        // else if($index == "all" && $page == "all" && $item != "all"){
        //     $index_list = Index::where(["page" => "root", "item" => "index"])->distinct()->orderBy('page', 'asc')->get();
        //     $page_list = Index::select("page")->distinct()->orderBy('page', 'asc')->get();
        //     $item_list = Index::select("item")->distinct()->orderBy('item', 'asc')->get();
        //     $data_list = Index::where(["item" => $item])->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        // }
        // else if($index != "all" && $page == "all" && $item != "all"){
        //     $index_list = Index::where(["page" => "root", "item" => "index"])->where(["title_name" => $index])->distinct()->orderBy('order_', 'asc')->get();
        //     $page_list = Index::where(["page" => $index, "item" => "nav"])->orderBy('page', 'asc')->get();
        //     $item_list = Index::select("item")->where(["page" => $index])->distinct()->orderBy('item', 'asc')->get();
        //     $data_list = Index::where(["page" => $index, "item" => $item])->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        // }
        // else if($index == "all" && $page != "all" && $item != "all"){
        //     $index_list = Index::where(["page" => "root", "item" => "index"])->distinct()->orderBy('page', 'asc')->get();
        //     $page_list = Index::select("page")->distinct()->orderBy('page', 'asc')->get();
        //     $item_list = Index::select("item")->where(["page" => $page])->distinct()->orderBy('item', 'asc')->get();
        //     $data_list = Index::where(["page" => $page, "item" => $item])->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        // }
        // else if($index != "all" && $page != "all" && $item != "all"){
        //     $index_list = Index::where(["page" => "root", "item" => "index"])->where(["title_name" => $index])->distinct()->orderBy('order_', 'asc')->get();
        //     $page_list = Index::where(["page" => $index, "item" => "nav"])->orderBy('page', 'asc')->get();
        //     $item_list = Index::select("item")->where(["page" => $index, "page" => $page])->distinct()->orderBy('item', 'asc')->get();
        //     $data_list = Index::where(["page" => $page, "item" => $item])->orderBy('item', 'asc')->orderBy('order_', 'asc')->orderBy('title', 'asc')->paginate($data_count)->appends(request()->query());
        // }

        $page_list = Index::where(['page'=>'index','item'=>'nav'])->orderBy('order_', 'asc')->get();
        $pic_board = Index::where(['page'=>$page,'item'=>'pic_board'])->orderBy('order_', 'asc')->get();
        $nav = Index::where(['page'=>$page,'item'=>'nav'])->orderBy('order_', 'asc')->get();
        // dd($select_page);
        // return;
        return view('web.backend.index.initial', compact('page', 'page_list', 'pic_board', 'nav'));  
        
    }

    // item 動作
    public function item()
    {  
        $input = Input::except('_token','_method');

        $item = $input["item"];
        if($input['method'] == "select"){
            $result = $this->select($item);
        }
        else if($input['method'] == "add"){
            $result = $this->add($item);
        }
        else if($input['method'] == "delete"){
            $result = $this->delete($item);
        }
        else if($input['method'] == "update"){
            $select = $input["select"];
            $result = $this->update($select, $item);
        }
        else if($input['method'] == "order"){
            $select = $input["select"];
            $result = $this->order($select, $item);
        }
        else if($input['method'] == "upload"){
            $result = $this->upload($item);
        }

        return $result;
    }

    public function select($item)
    {
        $find = Index::where(["page"=>$item["page"],"item"=>$item["item"],"title_name"=>$item["title_name"]])->first();
        
        // dd($find);
        // return;
        if($find){
            $result = [
                'status' => 0,
                'msg' => '查詢成功!',
                'find' => $find,
            ];
        }
        else{   
            $result = [
                'status' => 1,
                'msg' => '查詢失敗',
            ];
        }
        return $result;
    }
    public function add($item)
    {
        $find = Index::where(["page"=>$item["page"],"item"=>$item["item"],"title_name"=>$item["title_name"]])->first();
        
        $input = Input::except('_token','_method');
        if($input["title_image_upload"]){
            $entension = File::extension($item["title_image"]);//上传文件的后缀
            $temp_image = base_path().'/public/upload/front/index/temp/initial/'.$item['item'].'/title_image.'.$entension;
            $image = base_path().'/public/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id'].'/title/'.$item["title_image"];
            // dd(base_path().'/public/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id'].'/title');
            if(!File::isDirectory(base_path().'/public/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id'].'/title')){
                File::makeDirectory(base_path().'/public/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id'].'/title', 0775, true);
            }
            File::move($temp_image, $image);

            $image_url = '/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id'].'/title/'.$item["title_image"];
            $item["title_image"] = $image_url;
        }
        if($input["image_upload"]){
            $entension = File::extension($item["image"]);//上传文件的后缀
            $temp_image = base_path().'/public/upload/front/index/temp/initial/'.$item['item'].'/image.'.$entension;
            $image = base_path().'/public/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id'].'/'. $item["image"];
            if(!File::isDirectory(base_path().'/public/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id'])){
                File::makeDirectory(base_path().'/public/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id']);
            }            
            File::move($temp_image, $image);

            $image_url = '/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id'].'/'. $item["image"];
            $item["image"] = $image_url;
        }

        $ok = null;
        if(!$find)
        {
            // 檢查ID是否重複
            $find_id = Index::where(["id"=>$item["id"]])->first();

            if(!$find_id){
                $ok = Index::create($item);
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
                'msg' => '建立成功!'
            ];
        }
        else{   
            if($find)
            {
                $result = [
                    'status' => 1,
                    'msg' => 'Title Name重複，請更改標題!'
                ];
            }         
            else
            {
                if($find_id)
                {
                    $result = [
                        'status' => 1,
                        'msg' => 'ID重複，請更改標題!'
                    ];
                }                
            }    
        }
        return $result;
    }
    public function delete($item)
    {
        $find = Index::where(["page"=>$item["page"],"item"=>$item["item"],"title_name"=>$item["title_name"]])->delete();
        
        // dd($find);
        // return;
        if($find){
            $result = [
                'status' => 0,
                'msg' => '刪除成功!',
                'find' => $find,
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
    public function update($select, $item)
    {
        $update = Index::where(["page"=>$select["page"],"item"=>$select["item"],"title_name"=>$select["title_name"]])->update($item);
        
        // dd($find);
        // return;
        if($update){
            $result = [
                'status' => 0,
                'msg' =>  '更新成功!',
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
    public function order($select, $item)
    {
        $update = Index::where(["page"=>$select["page"],"item"=>$select["item"],"title_name"=>$select["title_name"]])->update(["order_"=>$item["order_"]]);
        $find = Index::where(["page"=>$select["page"],"item"=>$select["item"],"title_name"=>$select["title_name"]])->first();
           
        // dd($update);
        // return;
        if($update){
            $result = [
                'status' => 0,
                'msg' =>  '排序更新成功!',
                'find' => $find,
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
    //
    //图片上传
    public function upload($item)
    {
        $file = Input::file('index_file');
        // dd($file);
        // return;
        if($file -> isValid()){
            //dd($file);
            $realPath = $file -> getRealPath();//临时文件的绝对路径
            $entension = $file -> getClientOriginalExtension();//上传文件的后缀
            // http://learningbyrecording.blogspot.tw/2015/01/php.html
            $name_origin = basename($file->getClientOriginalName(),'.'.$entension).'.'.$entension;
            // //dd($name);
            // $newName = $name.'_'.date('YmdHis').mt_rand(100,999).'.'.$entension;
            $name = $item['target'].'.'.$entension;
            if(!File::isDirectory(base_path().'/public/upload/front/index/temp/initial/'.$item['item'])){
                File::makeDirectory(base_path().'/public/upload/front/index/temp/initial/'.$item['item'], 0775, true);
            }            
            $path = $file->move(base_path().'/public/upload/front/index/temp/initial/'.$item['item'].'/',$name);
            $filepath = '/upload/front/index/temp/initial/'.$item['item'].'/'.$name;

            // $path = $file->move(base_path().'/public/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id'].'/',$newName);
            // $filepath = '/public/upload/front/index/initial/'.$item['page'].'/'.$item['item'].'/'.$item['id'].'/'.$newName;
            return [
                'image' => $name_origin,
                'thumbnail' => $filepath,
            ];
        }       
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
}
