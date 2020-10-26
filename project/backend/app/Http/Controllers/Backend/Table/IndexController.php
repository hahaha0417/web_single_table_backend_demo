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

\backend\alias\hahaha_alias_table_define::Alias("App\\Http\\Controllers\\Backend\\Table\\");

use Spatie\Url\Url;

use hahaha\hahaha_controller_table_deal;

use App\Http\Controllers\Backend\Base\Table\IndexController as BaseIndexController;
use Request;
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
class IndexController extends CommonController
{
    use hahaha_controller_table_deal;

    /*
    index
    */
    public function index($stage, $class, $item)
    {  
        // ----------------------------------------------------- 
        // 開始                                                  
        // ----------------------------------------------------- 
        //         
        // ----------------------------------------------------- 
\hahaha\backend\hahaha_table_accounts::Instance();
\hahaha\backend\hahaha_table_accounts_detail::Instance();
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

        // ----------------------------------------------------- 
        // 設計                                                  
        // ----------------------------------------------------- 
        //         
        // ----------------------------------------------------- 

        

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

        // ----------------------------------------------------- 
        // 結束                                                  
        // ----------------------------------------------------- 
        //         
        // ----------------------------------------------------- 

        return view('web.backend.table.index');    
    }

    /*
    edit
    */
    public function edit($stage, $class, $item, $id)
    {       
        // ----------------------------------------------------- 
        // 開始                                                  
        // ----------------------------------------------------- 
        //         
        // ----------------------------------------------------- 

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

        // ----------------------------------------------------- 
        // 設計                                                  
        // ----------------------------------------------------- 
        //         
        // ----------------------------------------------------- 

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

        // ----------------------------------------------------- 
        // 結束                                                  
        // ----------------------------------------------------- 
        //         
        // ----------------------------------------------------- 

        return view('web.backend.table.edit'); 

    }    

}
