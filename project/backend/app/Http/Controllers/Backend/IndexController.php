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

use App\Http\Models\Backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use entities\backend\Accounts;
use EntityManager;

/*
使用laravel session處理login，有需要請自行換別種auth方式
目前知道可用的只有session & token & jwt auth
*/
class IndexController extends CommonController
{
    //
    public function __construct()
    {

    }

    public function index()
    {
        // index 設定檔
        $setting_index_ = \hahaha\hahaha_setting_index::Instance();
        $nav = &$setting_index_->nav;
        $menu = &$setting_index_->menu;
        $tail = &$setting_index_->tail;
        //
        return view('web.backend.index', compact('nav', 'menu', 'tail'));

    }
    public function login()
    {
        $input_ = request()->all();
        $recaptcha_response_ = request()->get('recaptcha_response');
        if (request()->isMethod('post') && isset($recaptcha_response_) )
        {
            $verify_ = true;
            // Build POST request:
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = env('GOOGLE_RECAPTCHA_SECRET_KEY');
            $recaptcha_response = $recaptcha_response_;
        
            // Make and decode POST request:
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);

            // Take action based on the score returned:
            if ($recaptcha->score >= 0.5) { 
                $account_repository_ = EntityManager::getRepository(Accounts::class);
                $account_ = $account_repository_->findByAccountLogin($input_['user_name']);
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
            } 
            else
            {
                // 驗證失敗
                return back()->with('msg', '驗證失敗!');
            }
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

    public function note()
    {
        return view('web.backend.note');

    }

}
