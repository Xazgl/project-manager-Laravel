<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserAuthRequest extends FormRequest
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
            'email'=>['required','email','max:255','exists:users,email'],
            'password'=>['required','string','min:8'],

        ];
    }
    public function messages()
    {
        return  [
            'email.required'=>'Введите Логин',
            'email.exists'=>'Данный логин неверный',
            'password.required'=>'Введите Пароль',
            'email.max'=>'Логин больше 255 символов ',
            'password.min'=>'Пароль слишком короткий'
        ];
    }
}
