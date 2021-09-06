<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            $account->password =  $account_data['password'];
            $account->email =   $account_data['email'];
            $account->name =  $account_data['name'];
            $account-> save();
          }
          return redirect(route('User.registration'));



    }




}
