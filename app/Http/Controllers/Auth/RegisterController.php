<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(RegisterFormRequest $request){
        if($request->isMethod('post')){  //←POSTだったら
        // postの処理
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => Hash::make($password),
            ]);

            $request->session()->put('username', $username);// sessionデータをセット
            return redirect('added');
        }else{
        // }
        // getの処理
        return view('auth.register');  //←GETだったら
        }
    }

    public function registerView(){
        return view('auth.register');
    }

    public function added(RegisterFormRequest $request){
            $username = $request->session()->get('username');// sessionデータから値を取得
            return view('auth.added',['username'=>$username]);
    }
}
