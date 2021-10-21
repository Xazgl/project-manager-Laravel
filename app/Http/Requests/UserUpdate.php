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

        'name'=>['required','string','max:255'],
        'surname'=>['required','string','max:255'],

    ];
}

    public function messages()
{
    return  [
        'avatar.image'=>'Формат картинки не верный',

    ];
}


}
