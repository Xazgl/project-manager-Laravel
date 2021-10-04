<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration()
    {
        return view('User.registration');
    }

    public function reg_store(UserRegister $request)
    {
            $account_data = $request->validated();
          //$account_data['password'] == $account_data['password2']
            $account = new User();
            $account->password = Hash::make($account_data['password']);
            $account->email = $account_data['email'];
            $account->name = $account_data['name'];
            $account->surname = $account_data['surname'];
            $account->birthday = $account_data['birthday'];
            $account->save();

            // авторизация после регистрации
            Auth::login($account);

        return redirect(route('index'));
    }

    public function loginForm()
    {
        return view('user.login');

    }

    public function auth(UserAuthRequest $request)

    {
        $data = $request->validated();

        if (!auth::attempt([
            'email' => $data ['email'],
            'password' => $data['password']
            ], isset($data['remember']))) {
            return back()->withErrors([
                'message' => 'Неверный пароль']);
            }
        return redirect(route('index'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        //Чистим данные пользователя в его хранилище
        $request->session()->invalidate();
        //Убираем токен "ЗАПОМНИТЬ"
        $request->session()->regenerateToken();

        return redirect(route('loginForm'));
    }

    public function show()
    {

          $data=user::select('id','name','surname','birthday','email')->find(Auth::id());
          return view('user.show',['user'=>$data]);

    }

}
/* $user=User::select('id','email','password')
         ->where('email','=',$data['email'])
         ->first();

     if(!isset( $user)) {
        return back()->withErrors([
         'message'=>'Неверный логин'
        ]);
     } else {
             if (!Hash::check($data['password'],$user->password)) {
                 return back()->withErrors([
                     'message'=>'Неверный пароль']);
                }
            }

     return redirect(route('index'));
    } */


