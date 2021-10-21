<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
{
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
        'name'=>['required','string','max:255'],
        'surname'=>['required','string','max:255'],

    ];
}

    public function messages()
{
    return  [
        'avatar.image'=>'Формат картинки не верный',
        'email.required'=>'Введите Логин',
        'email.unique'=>'Логин уже существует',
        'email.max'=>'Логин больше 255 символов ',
        'email.name'=>'Введите Имя',
        'email.surname'=>'Введите Фамилию'
    ];
}


}
