<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;
use App\Models\Avatar;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration()
    {
        return view('user.registration');
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


        //Привязка файла
        //Если файл был успешно загружен
        if (isset($account_data['avatar'])) {
            //  1.Сохраняем файл в папке images
            $path = $account_data['avatar']->store('images');
            //  2.Сохраняем файл в базу
            $avatar = new Avatar();
            $avatar->user_id =$account->id;
            $avatar->path = $path;
            $avatar->name = $account_data['avatar']->getClientOriginalName();
            $avatar->mime = $account_data['avatar']->getClientMimeType();
            $avatar->save();}

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

    public function avatar ($id,$user_id) // для отображения аватар путь в вьшку из базы
    {
        $avatar= Avatar::select ()->find($user_id);
        $user=User::select()->find($id);
        if ($user_id===$id) {
            $avatar_img=$avatar->path();
            echo $avatar_img;
        }

    }
    public function avatar_update ($id,$user_id, $request) {

        $data = $request->all();// собираем данные с формы

        $user=User::select()->find($id);
        //Получили необходимый аватар из базы,который  будем редактировать
        $avatar = Avatar::find($user_id);
        if (isset($data['avatar'])) {

            //Сохраняю загружженый файл с формы
            $path=$data['avatar']->store('images');

            //Получим текущий файл, который был привязан к данной задаче
            $file = $user->avatar;

            //Если у задачи не был привзял старый файл
            if (!isset($file)) {
                // создается новый
                $file = new File();
                $file->user_id = $user->id;
            }
            //Заполняем данные
            $file->path = $path;
            $file->name = $data['file']->getClientOriginalName();
            $file->mime = $data['file']->getClientMimeType();
            $file->save();
        }
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


