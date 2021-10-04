<?php

namespace App\Http\Requests;

use App\Models\Task;
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
        //$task=Task::find($this->route('task'));
        //Находим id задачи из параметера маршрутка {task}
        $taskID=$this->route('task');

        //Извлекаем из базы задачу с $id=$taskID
        $task=Task::find($taskID);

        //Если вошли в базу нашли задачу
        if (isset($task)) {
           return  $this->user()->can('update',$task);
        } else {
            return false;
        }

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
            'status'=>['required','numeric','max:255','exists:statuses,id'],
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
            'status.required'=>'Не выбран статус задачи',
            'status.exists'=>'Выбран неизвестный статус',
            'mini.*.max'=>'Мини задача больше 255 символов '
        ];
    }
}
