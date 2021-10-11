<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Project;

class ProjectController extends Controller
{
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store_project(ProjectCreateRequest $request)
    {
        $data = $request->validated();

        // Получение объекта статуса "Новая"
        $status = Status::find(1);
        //Привязка к статусу объекта задачи
        $project = $status->project()->create([
            'name' => $data['name'],
        ]);


        $project->users()->attach(Auth::id());


        return redirect(route('project.index'));
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)

    {

        $project = Project::select('id', 'name', 'status_id','tasks')->find($id);
        foreach ($project->tasks as $task) {

        };
        $status = $project > status;
        if (Auth::user()->can('view', $project)) {
            return view('project.show', ['project' => $project, 'status' => $status]);
        } else {
            return redirect(route('project.index'));
        }
        $user = App\User::find(1);

        foreach ($user->roles as $role);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::select('id', 'name', 'status_id')->find($id);
        $statuses = Status::get();
        return view('project.edit', [
            'project' => $project,
            'statusList' => $statuses
        ]);
    }

    public function update(ProjectUpdateRequest $request, $id)
    {
        //СОбрали все данные с формы
        $data = $request->validated();

        //Получили необходимую задачу из базы,которую будем редактировать
        $project = Project::find($id);

        //Перезаписываем данные
        $project->title = $data['name'];
        $project->status_id = $data['status'];
        //сохраняем в базе
        $project->save();





        //редирект на страницу с детальным опис
        return redirect(route('project.show', ['project' => $id]));
}


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    //получаем задачу из базы
    $project = project::withTrashed()->find($id);
    // если уже удалена
    if ($project->trashed()) {

        //удаляем связь с юзером
        $project->users()->detach();
        //удаляем связь с задачами
        $project->tasks()->detach();
        $project->forceDelete();
    } else {
        //удаление
        $$project->delete();
    }
    return redirect(route('project.index'));
}



    public function show_trash_project() {
        $trash = Auth::user()->project()->onlyTrashed()
            ->get();

        return view(
            'project.trash',
            ['list' => $project]
        );
    }


    public function restore($id)
    {
        $project = project::withTrashed()->find($id);
        $project->restore();
        return redirect(route('show_trash_project'));
    }
}


