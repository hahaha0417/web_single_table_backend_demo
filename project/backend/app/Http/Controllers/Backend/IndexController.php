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
namespace App\Http\Controllers\Backend;


use hahahasublib\hahaha_orm_doctrine;



use App\Http\Models\Backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use entities\backend\Accounts;
use EntityManager;
use pub\hahaha_option as hahaha_option;



/*
使用laravel session處理login，有需要請自行換別種auth方式
目前知道可用的只有session & token & jwt auth

/*
 ----------------------------------------
注意 : Aid為呼叫GPL程式相關代碼
 ----------------------------------------
*/
class IndexController extends CommonController
{
    //
    public function __construct()
    {

    }

    /*

    */
    public function index()
    {
        // index 設定檔
        $setting_index_ = \hahaha\backend\hahaha_setting_index::Instance();
        $nav = &$setting_index_->Nav;
        $menu = &$setting_index_->Menu;
        $tail = &$setting_index_->Tail;

        //
        $page_url = \p_ha::V_Url('cover');
        // 順便記錄打開順序，目前只有四層
        $menu_open = [];
        $menu_target = null;

        return view('web.backend.index', compact('nav', 'menu', 'tail', 'page_url', 'menu_open', 'menu_target'));

    }

    /*
    指定頁面

    table
    http://127.0.0.1:8700/backend/page/table/backend_accounts_list
    tool
    http://127.0.0.1:8700/backend/page/tool/table_field
    */
    public function page($class, $name)
    {
        $mapping_ = [
            "table" => "table",
            "tool" => "class",
        ];

        if(empty($mapping_[$class]))
        {
            return;
        }

        $page_type_ = &$mapping_[$class];

        $page_ = request()->get('page');
        $order_ = request()->get('order');

        if($page_type_ == "table")
        {
            $global_pub_ = \p_ha\_Global::Get();
            // index 設定檔
            $setting_index_ = \hahaha\backend\hahaha_setting_index::Instance();
            $nav = &$setting_index_->Nav;
            $menu = &$setting_index_->Menu;
            $tail = &$setting_index_->Tail;

            $temp_name = explode('_', $name);
            if(is_array($temp_name))
            {
                $menu_target = $name;
                $level = count($temp_name);
            }

            $page_url = \p_ha::V_Url('cover');
            // 順便記錄打開順序，目前只有四層
            $menu_open = [];

            foreach($menu as $key => &$value)
            {
                // 第一層
                if(!empty($value['name']) && $value['name'] == $name && empty($value['menu']))
                {
                    $page_url = &$value['url'];
                    $first_ = true;
                    if(isset($page_) || isset($order_))
                    {
                        $page_url .= "?";
                    }
                    $key_parameter_ = $page_;
                    if(isset($key_parameter_))
                    {
                        if(!$first_)
                        {
                            $page_url .= "&";
                        }
                        else
                        {
                            $first_ = false;
                        }
                        $page_url .= "page=" . $key_parameter_;
                    }
                    $key_parameter_ = $order_;
                    if(isset($key_parameter_))
                    {
                        if(!$first_)
                        {
                            $page_url .= "&";
                        }
                        else
                        {
                            $first_ = false;
                        }
                        $page_url .= "order=" . $key_parameter_;
                    }
                    // 替換掉default_page預設路徑
                    $menu[__('backend.default_page')]['url'] = \p_ha::V_Url("page/{$class}/{$value['name']}");

                    //$menu_open[$key] = true;
                    break 1;
                }
                // else if(!empty($value['menu']) && is_array($value['menu']))
                // 分類
                else if($value['name'] == $class && !empty($value['menu']) && is_array($value['menu']))
                {
                    // 第二層
                    foreach($value['menu'] as $key2 => &$value2)
                    {
                        if(!empty($value2['name']) && $value2['name'] == $name && $level == 1)
                        {
                            $page_url = &$value2['url'];
                            $first_ = true;
                            if(isset($page_) || isset($order_))
                            {
                                $page_url .= "?";
                            }
                            $key_parameter_ = $page_;
                            if(isset($key_parameter_))
                            {
                                if(!$first_)
                                {
                                    $page_url .= "&";
                                }
                                else
                                {
                                    $first_ = false;
                                }
                                $page_url .= "page=" . $key_parameter_;
                            }
                            $key_parameter_ = $order_;
                            if(isset($key_parameter_))
                            {
                                if(!$first_)
                                {
                                    $page_url .= "&";
                                }
                                else
                                {
                                    $first_ = false;
                                }
                                $page_url .= "order=" . $key_parameter_;
                            }
                            // 替換掉default_page預設路徑
                            $menu[__('backend.default_page')]['url'] = \p_ha::V_Url("page/{$class}/{$value2['name']}");

                            $menu_open[$key] = true;
                            //$menu_open[$key2] = true;
                            break 2;
                        }
                        else if(!empty($value2['menu']) && is_array($value2['menu']))
                        {
                            foreach($value2['menu'] as $key3 => &$value3)
                            {
                                if(!empty($value3['name']) && $value3['name'] == $name && $level == 2)
                                {
                                    $page_url = &$value3['url'];
                                    $first_ = true;
                                    if(isset($page_) || isset($order_))
                                    {
                                        $page_url .= "?";
                                    }
                                    $key_parameter_ = $page_;
                                    if(isset($key_parameter_))
                                    {
                                        if(!$first_)
                                        {
                                            $page_url .= "&";
                                        }
                                        else
                                        {
                                            $first_ = false;
                                        }
                                        $page_url .= "page=" . $key_parameter_;
                                    }
                                    $key_parameter_ = $order_;
                                    if(isset($key_parameter_))
                                    {
                                        if(!$first_)
                                        {
                                            $page_url .= "&";
                                        }
                                        else
                                        {
                                            $first_ = false;
                                        }
                                        $page_url .= "order=" . $key_parameter_;
                                    }
                                    // 替換掉default_page預設路徑
                                    $menu[__('backend.default_page')]['url'] = \p_ha::V_Url("page/{$class}/{$value3['name']}");

                                    $menu_open[$key] = true;
                                    $menu_open[$key2] = true;
                                    //$menu_open[$key3] = true;
                                    break 3;
                                }
                                else if(!empty($value3['menu']) && is_array($value3['menu']))
                                {
                                    foreach($value3['menu'] as $key4 => &$value4)
                                    {
                                        if(!empty($value4['name']) && $value4['name'] == $name && $level == 3)
                                        {
                                            $page_url = &$value4['url'];
                                            $first_ = true;
                                            if(isset($page_) || isset($order_))
                                            {
                                                $page_url .= "?";
                                            }
                                            $key_parameter_ = $page_;
                                            if(isset($key_parameter_))
                                            {
                                                if(!$first_)
                                                {
                                                    $page_url .= "&";
                                                }
                                                else
                                                {
                                                    $first_ = false;
                                                }
                                                $page_url .= "page=" . $key_parameter_;
                                            }
                                            $key_parameter_ = $order_;
                                            if(isset($key_parameter_))
                                            {
                                                if(!$first_)
                                                {
                                                    $page_url .= "&";
                                                }
                                                else
                                                {
                                                    $first_ = false;
                                                }
                                                $page_url .= "order=" . $key_parameter_;
                                            }
                                            // 替換掉default_page預設路徑
                                            $menu[__('backend.default_page')]['url'] = \p_ha::V_Url("page/{$class}/{$value4['name']}");

                                            $menu_open[$key] = true;
                                            $menu_open[$key2] = true;
                                            $menu_open[$key3] = true;
                                            //$menu_open[$key4] = true;
                                            break 4;
                                        }
                                        else if(!empty($value4['menu']) && is_array($value4))
                                        {
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        else if($page_type_ == "class")
        {
            $global_pub_ = \p_ha\_Global::Get();
            // index 設定檔
            $setting_index_ = \hahaha\backend\hahaha_setting_index::Instance();
            $nav = &$setting_index_->Nav;
            $menu = &$setting_index_->Menu;
            $tail = &$setting_index_->Tail;

            $temp_name = explode('_', $name);
            if(is_array($temp_name))
            {
                $menu_target = $name;
                $level = count($temp_name);
            }

            $page_url = \p_ha::V_Url('cover');
            // 順便記錄打開順序，目前只有四層
            $menu_open = [];

            foreach($menu as $key => &$value)
            {
                // 第一層
                if(!empty($value['name']) && $value['name'] == $name && empty($value['menu']))
                {
                    $page_url = &$value['url'];
                    // 替換掉default_page預設路徑
                    $menu[__('backend.default_page')]['url'] = \p_ha::V_Url("page/{$class}/{$value['name']}");

                    //$menu_open[$key] = true;
                    break 1;
                }
                // else if(!empty($value['menu']) && is_array($value['menu']))
                // 分類
                else if($value['name'] == $class && !empty($value['menu']) && is_array($value['menu']))
                {
                    // 第二層
                    foreach($value['menu'] as $key2 => &$value2)
                    {
                        if(!empty($value2['name']) && $value2['name'] == $name && $level == 2)
                        {
                            $page_url = &$value2['url'];
                            // 替換掉default_page預設路徑
                            $menu[__('backend.default_page')]['url'] = \p_ha::V_Url("page/{$class}/{$value2['name']}");

                            $menu_open[$key] = true;
                            //$menu_open[$key2] = true;
                            break 2;
                        }
                        else if(!empty($value2['menu']) && is_array($value2['menu']))
                        {
                            foreach($value2['menu'] as $key3 => &$value3)
                            {
                                if(!empty($value3['name']) && $value3['name'] == $name && $level == 3)
                                {
                                    $page_url = &$value3['url'];
                                    // 替換掉default_page預設路徑
                                    $menu[__('backend.default_page')]['url'] = \p_ha::V_Url("page/{$class}/{$value3['name']}");

                                    $menu_open[$key] = true;
                                    $menu_open[$key2] = true;
                                    //$menu_open[$key3] = true;
                                    break 3;
                                }
                                else if(!empty($value3['menu']) && is_array($value3['menu']))
                                {
                                    foreach($value3['menu'] as $key4 => &$value4)
                                    {
                                        if(!empty($value4['name']) && $value4['name'] == $name && $level == 4)
                                        {
                                            $page_url = &$value4['url'];
                                            // 替換掉default_page預設路徑
                                            $menu[__('backend.default_page')]['url'] = \p_ha::V_Url("page/{$class}/{$value4['name']}");

                                            $menu_open[$key] = true;
                                            $menu_open[$key2] = true;
                                            $menu_open[$key3] = true;
                                            //$menu_open[$key4] = true;
                                            break 4;
                                        }
                                        else if(!empty($value4['menu']) && is_array($value4))
                                        {
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return view('web.backend.index', compact('nav', 'menu', 'tail', 'page_url', 'menu_open', 'menu_target'));

    }

    public function login()
    {
        // $hahaha_option = hahaha_option::Instance()->Initial();


        $input_ = request()->all();
        $recaptcha_response_ = request()->get('recaptcha_response');
        if (request()->isMethod('post') && isset($recaptcha_response_) )
        {
            hahaha_orm_doctrine::Instance()->Initial_Base_Laravel();

            $hahaha_orm_doctrine_ = hahaha_orm_doctrine::Instance();

            $verify_ = true;
            // Build POST request:
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = env('GOOGLE_RECAPTCHA_SECRET_KEY');
            $recaptcha_response = $recaptcha_response_;

            // Make and decode POST request:
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);

            // Take action based on the score returned:
            // if ($recaptcha->score >= 0.5) {
                $account_repository_ = $hahaha_orm_doctrine_->Entity_Manager_->getRepository(Accounts::class);
                $account_ = [];
                $account_repository_->findByAccountLogin($account_, $input_['user_name']);
                $account_ = count($account_) == 1 ? $account_[0] : null;

                if(empty($account_))
                {
                    return back()->with('msg','沒有使用者!');
                }
                else if ($input_['user_name'] == $account_["account"] && md5($input_['user_pass']) != $account_["password"])
                {
                    return back()->with('msg','用戶名或密碼錯誤!');
                }

                session(['backend_user' => $account_["account"]]);

                return redirect('backend');
            // }
            // else
            // {
            //     // 驗證失敗
            //     return back()->with('msg', '驗證失敗!');
            // }
        }
        else
        {
            $value = session('backend_user');
            //session()->forget('backend_user');

            //session()->flush();
            if (!session()->has('backend_user'))
            {
                return view('web.backend.login');
            }
            else
            {
                return redirect('backend');
            }

        }
    }
    public function logout()
    {
        session()->forget('backend_user');
        session()->flush();
        return view('web.backend.logout');

    }

    public function cover()
    {
        return view('web.backend.cover');
    }

    public function note()
    {
        return view('web.backend.note');
    }

    // ---------------------------------------------------------------
    // 輔助
    // ---------------------------------------------------------------
    public function aid()
    {
        return view('web.backend.aid');
    }

    public function aid_env()
    {
        return view('web.backend.aid.env');
    }

    public function aid_tool()
    {
        return view('web.backend.aid.tool');
    }

    public function aid_composer()
    {
        return view('web.backend.aid.composer');
    }

    public function aid_npm()
    {
        return view('web.backend.aid.npm');
    }

    public function aid_git()
    {
        return view('web.backend.aid.git');
    }

    public function aid_migrate()
    {
        return view('web.backend.aid.migrate');
    }
    // ---------------------------------------------------------------

    // ---------------------------------------------------------------
    //
    // ---------------------------------------------------------------

    // ---------------------------------------------------------------

}
