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

           $account= new User();
           $account->email =   $account_data['email'];
           $account->password =  $account_data['password'];
           $account->name =  $account_data['name'];
           $account-> save();

        return redirect(route('tasks.index'));

    }




}
