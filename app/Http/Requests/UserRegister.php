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
            'avatar'=>['file','image','max:1024'],
            'email'=>['required','email','max:255','unique:users,email'],
            'password'=>['required','string','confirmed',Password::min(6) ->mixedCase()],
            'name'=>['required','string','max:255'],
            'surname'=>['required','string','max:255'],
            'birthday'=>['required','date_format:Y-m-d']
        ];
    }

    public function messages()
    {
        return  [
            'avatar.image'=>'Формат картинки не верный',
            'email.required'=>'Введите Логин',
            'email.unique'=>'Логин уже существует',
            'password.required'=>'Введите Пароль',
            'email.max'=>'Логин больше 255 символов ',
            'password.min'=>'Пароль слишком короткий',
            'password.mixedCase'=>'Пароль должен содержать заглавные и строчные буквы',
            'password.confirmed'=>'Пароли не совпадают',
            'password.numbers'=>'Пароль должен содержать числа',
            'email.name'=>'Введите Имя',
            'email.surname'=>'Введите Фамилию'
        ];
    }


}
