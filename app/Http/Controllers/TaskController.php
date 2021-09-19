<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
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
            ['list'=>$tasks]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();

        //$task= new Task();
        //$task->title = $data['title'];
        //$task->preview_text = $data['preview'];
        //$task->detail_text = $data['detail'];
        //$task->status_id=1;
        //$task-> save();




        //Получение объекта статуса "Новая"
        $status = Status::find(1);
        //Привязка к статусу объекта задачи
        $task=$status->tasks()->create([
            'title' =>$data['title'],
            'preview_text' =>$data['preview'],
            'detail_text' => $data['detail']
        ]);
        $task->users()->attach(Auth::id());
        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

      {
         $task = Task::select('id','title','detail_text','status_id')->find($id);
         $status=$task->status;
          return view('tasks.show',['task'=>$task, 'status'=>$status]);
      }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::select('id','title','detail_text','preview_text','status_id')->find($id);
        $statuses=Status::get();
        return view('tasks.edit',[
            'task'=>$task,
            'statusList'=>$statuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //СОбрали все данные с формы
      $data = $request->all();
      //Получили необходимую хадачу из базы,которую будем редактировать
      $task=Task::find($id);
      //Перезаписываем данные
      $task->title=$data['title'];
      $task->preview_text=$data['preview'];
      $task->detail_text=$data['detail'];
      $task->status_id=$data['status'];
      //сохраняем в базе
      $task->save();
      //редирект на страницу с детальным опис
      return redirect(route('tasks.show',['task'=>$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}













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



