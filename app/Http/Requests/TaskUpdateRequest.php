<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
            'status'=>['required','numeric','max:255','exists:statuses,id']
        ];
    }
    public function messages()
    {
        return  [
            'title.required'=>'Не заполнено название задачи',
            'preview.required'=>'Не заполнено краткое описание задачи',
            'detail.required'=>'Не заполнен текст',
            'status.required'=>'Не выбран статус задачи',
           'status.exists'=>'Выбран неизвестный статус'
        ];
    }
}
