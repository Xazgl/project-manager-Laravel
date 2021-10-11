<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            $projectID=$this->route('project');

            //Извлекаем из базы задачу с $id=$taskID
            $project=Project::find($projectID);

            //Если вошли в базу нашли задачу
            if (isset($project)) {
                return  $this->user()->can('update',$project);
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
            'name'=>['required','string','max:255'],
          'task' =>['required','string','max:255']
        ];
    }
    public function messages()
    {
        return  [
            'name.required'=>'Не заполнено название задачи',
            'status.exists'=>'Выбран неизвестный статус',

        ];
    }
}
