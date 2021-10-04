<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
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
            'title'=>['required','string','max:255'],
            'preview'=>['required','string','max:255'],
            'detail'=>['required','string','max:1000'],
            'mini'=>['array'],
            'mini.*'=>['string','max:255'],
            'file'=>['file','image','max:1024']
        ];
    }

    public function messages()
    {
        return  [
            'title.required'=>'Не заполнено название задачи',
            'preview.required'=>'Не заполнено краткое описание задачи',
            'detail.required'=>'Не заполнен текст',
            'mini.*.max'=>'Мини задача больше 255 символов ',
            'mini.*.string'=>'Мини задача (Должна быть корректной строкой)'
        ];
    }
}
