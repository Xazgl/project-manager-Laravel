<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>['required','email','max:255','unique:users,email'],
            'password'=>['required','string',Password::min(8) ->mixedCased() ->numbers()],
            'password2'=>['required','string','min:8'],
            'name'=>['required','string','max:255'],
            'surname'=>['required','string','max:255'],
            'birthday'=>['required','data','max:255'],
        ];
    }

    public function messages()
    {
        return  [
            'email.required'=>'Введите Логин',
            'email.exists'=>'Данный логин неверный',
            'email.unique'=>'Логин уже существует',
            'password.required'=>'Введите Пароль',
            'email.max'=>'Логин больше 255 символов ',
            'password.min'=>'Пароль слишком короткий',
            'password.mixedCase'=>'Пароль должен содержать заглавные и строчные буквы',
            'password.numbers'=>'Пароль должен содержать числа',
        ];
    }



}
