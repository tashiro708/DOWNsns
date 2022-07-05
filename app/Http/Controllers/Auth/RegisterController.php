<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');//ログインしているか、していないか
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [ //make=validatorかける
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|',
            'passwordconfirm'=> 'required|string|min:4|same:password'
        ],[
            'username.required' => '入力必須項目になります',
            'mail.required' => '入力必須項目になります',
            'password.required' => '入力必須項目になります',
            'passwordconfirm.same' => '入力必須項目になります',
            'mail.max' => '255字以内になります'
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
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm()moji{
    //     return view("auth.register")iti;
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $validator=$this->validator($data);

            if ($validator->fails() ) { //ログイン失敗
                return redirect('/register')
                ->withErrors($validator)
                ->withInput();
            }else{
                $this->create($data);//ログイン成功
                return redirect('added');
            }
        }
        return view('auth.register');
    }

    public function added(){

        $username=\DB::table('users')
        ->latest()
        ->first();

        return view('auth.added', compact('username'));
    }
    
}