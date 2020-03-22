<?php

namespace App\Http\Controllers\Auth;

use App\Libraries\Lib_const_status;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'portrait' => $data['portrait'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function showRegistrationForm(){

        return view('auth.register');

    }


    public function register(Request $request){

        $param = $request->all();
        $fromErr = $this->validatorFrom([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',
            'captcha'=>'required|captcha'
        ],[
            'required'=>Lib_const_status::ERROR_REQUEST_PARAMETER,
            'string'=>Lib_const_status::MUST_BE_A_STRING,
            'max'=>Lib_const_status::EXCEEDING_THE_MAXIMUM,
            'email'=>Lib_const_status::THE_MAILBOX_FORMAT_IS_NOT_CORRECT,
            'unique'=>Lib_const_status::MAILBOX_ALREADY_EXISTS,
            'confirmed'=>Lib_const_status::TWO_PASSWORDS_DO_NOT_MATCH,
            'captcha'=>Lib_const_status::VERIFICATION_CODE_ERROR,
        ]);
        if($fromErr){//输出表单验证错误信息

            return $this->response($fromErr);
        }

        $param['portrait'] = 'uploads/img/default_portrait.png';


        event(new Registered($user = $this->create($param)));

        $this->guard()->login($user);

        $response_json = $this->initResponse();

        $response_json->status = Lib_const_status::SUCCESS;

        return $this->response($response_json);

    }
}
