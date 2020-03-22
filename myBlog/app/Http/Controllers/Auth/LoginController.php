<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Libraries\Lib_const_status;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected $maxLoginAttempts = 5; //每分钟最大尝试登录次数
    protected $lockoutTime = 600; //登录锁定时间

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * 显示 登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm(){

        return view('auth.login');
    }


    /**
     * 重写登录
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $param = $request->all();
        $fromErr = $this->validatorFrom([
            'email'=>'required|string|email|max:255',
            'password'=>'required|string|min:8',
        ],[
            'required'=>Lib_const_status::ERROR_REQUEST_PARAMETER,
            'string'=>Lib_const_status::MUST_BE_A_STRING,
            'max'=>Lib_const_status::EXCEEDING_THE_MAXIMUM,
            'email'=>Lib_const_status::THE_MAILBOX_FORMAT_IS_NOT_CORRECT,
        ]);
        if($fromErr){//输出表单验证错误信息

            return $this->response($fromErr);
        }


        $response_json = $this->initResponse();
        try{



            $response_json->data = 1;
            return $this->response($response_json);
        }catch (\Exception $e){
            $response_json->data = $e->getMessage();
            return $this->response($response_json);
        }



    }



    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }


}
