<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    public function index()
    {
         $tasks = Task::select('id','title','preview_text')->get();
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
        $status->tasks()->create([
            'title' =>$data['title'],
            'preview_text' =>$data['preview'],
            'detail_text' => $data['detail']
        ]);
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
          return view('tasks.show');
      }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
