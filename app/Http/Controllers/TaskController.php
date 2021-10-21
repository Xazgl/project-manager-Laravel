<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\File;
use App\Models\Mini;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{


    public function index()
    {
        $tasks = Auth::user()->tasks()//->select('id','title','preview_text')
        ->get();
        return view(
            'tasks.index',
            ['list' => $tasks]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $project=Project::find($id);
        return view('tasks.create',['id'=>$project->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
 public function store($id,TaskCreateRequest $request)
   {
       $project=Project::find($id);
       $data=$request->validated();

    //$task= new Task();
    //$task->title = $data['title'];
    //$task->preview_text = $data['preview'];
    //$task->detail_text = $data['detail'];
    //$task->status_id=1;
    //$task-> save();


  // Получение объекта статуса "Новая"
     $status = Status::find(1);
     //Привязка к статусу объекта задачи
     $task=$status->tasks()->create([
         'title' =>$data['title'],
         'preview_text' =>$data['preview'],
         'detail_text' => $data['detail'],
         'project_id'=>$id
     ]);
     //Привязка мини задач
       //$data['mini']
       if (isset ($data['mini'])) {
       foreach($data['mini'] as $mini) {
           if (strlen($mini) > 0) {   // если длина строки болбше 0 то дальше
               $miniModel = new Mini();
               $miniModel->text = $mini;
               // Беру id из таблицы tasks сохранненой в переменой $task выше
               $miniModel->task_id = $task->id;
               $miniModel->save();
           }
       }
       }

            //Привязка файла
            //Если файл был успешно загружен
       if (isset($data['file'])) {
           //  1.Сохраняем файл в папке images
           $path = $data['file']->store('images');
           //  2.Сохраняем файл в базу
           $file = new File();
           $file->task_id = $task->id;
           $file->path = $path;
           $file->name = $data['file']->getClientOriginalName();
           $file->mime = $data['file']->getClientMimeType();
           $file->save();
       }
       return redirect(route('project_tasks.show',['id'=>$id]));
 }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


 public function show($id, $task_id)
    {

        $project=Project::find($id);
            $task = Task::select('id', 'title','preview_text', 'detail_text', 'status_id')->find($task_id);
            $status = $task->status;
        if (Auth::user()->can('view',$project)) {  // c помощью can вызывается функция политки тру или фолс
            return view('tasks.show', ['task' => $task, 'status' => $status,'project' => $project,'task_id'=>$task->id,'id'=>$project->id]);
        } else {
            return redirect(route('project_tasks.show',['id'=>$project->id]));
        }
    }


    public function edit($id, $task_id)
    {
        $project=Project::find($id);
        $task = Task::select('id', 'title', 'detail_text', 'preview_text', 'status_id')->find($task_id);
        $statuses = Status::get();
        return view('tasks.edit', [
            'id'=>$project->id,
            'task_id' => $task->id,
            'statusList' => $statuses,
            'task'=>$task
        ]);

    }


    public function update( $id,$task_id,TaskUpdateRequest $request)
    {
        //СОбрали все данные с формы
        $data = $request->validated();

        $project=Project::find($id);
        //Получили необходимую задачу из базы,которую будем редактировать
        $task = Task::find($task_id);

        //Перезаписываем данные
        $task->title = $data['title'];
        $task->preview_text = $data['preview'];
        $task->detail_text = $data['detail'];
        $task->status_id = $data['status'];
        //сохраняем в базе
        $task->save();

        if(isset ($data['mini'])) {
            //удалить все мини-задачи для текущей задачи
            $task->miniss()->delete();
            //сохраняем мини-задачи из формы
            foreach ($data['mini'] as $mini) {
                if (strlen($mini) > 0) {
                    $miniModel = new Mini();
                    $miniModel->text = $mini;
                    $miniModel->task_id = $task->id; // привязываю к задаче
                    $miniModel->save();
                }
            }
        }
        //Если файл был загружен с формы
         if (isset($data['file'])) {

             //Сохраняю загружженый файл с формы
             $path=$data['file']->store('images');

             //Получим текущий файл, который был привязан к данной задаче
            $file = $task->file;

           //Если у задачи не был привзял старый файл
            if (!isset($file)) {
                // создается новый
                $file = new File();
                $file->task_id = $task->id;
            }
             //Заполняем данные
                $file->path = $path;
                $file->name = $data['file']->getClientOriginalName();
                $file->mime = $data['file']->getClientMimeType();
                $file->save();
            }

        //редирект на страницу с детальным опис
        return redirect(route('tasks.show', ['id'=>$project->id,'task_id' => $task->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy ($id,$task_id)
    {
        $project=Project::find($id);
        //Получили необходимую задачу из базы,которую будем редактировать
        //получаем задачу из базы
        $task = Task::withTrashed()->find($task_id);
         // если уже удалена
        if ($task->trashed()) {

        //удалить все мини-задачи для текущей задачи
        $task->miniss()->delete();
        //удаляем файлы
        $task->file()->delete();
        //удаляем связь с проектом
        $task->projects()->detach();
        //
        $task->forceDelete();
        } else {
        //удаление
        $task->delete();
        }
        return redirect(route('project_tasks.show',['id'=>$project->id]));
    }



    public function show_trash() {

        $trash = Auth::user()->projects()->tasks()->onlyTrashed()
        ->get();

        return view(
            'tasks.trash',
            ['list' => $trash]
        );
    }


    public function restore($id)
    {
        $task = Task::withTrashed()->find($id);
        $task->restore();
        return redirect(route('show_trash'));
    }
}




/*
//App\providers\AuthServiceProvider создаем шлюз

public function boot()
{
    $this->registerPolicies();
    Gate::define('update-my_task',function (Auth::$user(),$task_id) {
    return $user->id===$task_user->user_id;
})
}

//в TaskController в функции show авторизируем действия шлюза с помощью allows

public function show($id)
{
    if (Gate::allows('update-my_task', $task_user)) {

        {
            $task = Task::select('id', 'title', 'detail_text', 'status_id')->find($id);
            $status = $task->status;
            return view('tasks.show', ['task' => $task, 'status' => $status]);
        }

    }

}
*/


