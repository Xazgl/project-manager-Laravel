<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration() {
    return view('User.registration');
    }

    public function reg_store(Request $request)
    {
        $account_data=$request->all();
          if ( $account_data['password']== $account_data['password2']) {
            $account= new User();
            $account->password = Hash::make($account_data['password']);
            $account->email =   $account_data['email'];
            $account->name =  $account_data['name'];
            $account-> save();
          }
          return redirect(route('User.registration'));



    }

    public function loginForm ()
    {
        return view('users.login');

    }

    public function auth(Request $request)

    {
     $data=$request->all();

     if (!auth::attempt([
         'email'=> $data ['email'],
         'password'=>$data['password']
     ])) {
         return back()->withErrors([
             'message'=>'Неверный пароль']);

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

}
