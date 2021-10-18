<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreateRequest;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Project;
use App\Models\Mini;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Auth::user()->projects()//->select('id', 'name', 'created_at', 'updated_at')
        ->get();



        return view(
            'project.index',
            ['list' => $projects],

        );
    }

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
    public function store(ProjectCreateRequest $request)
    {
        $data = $request->all();

        /*  $project = $this->projects()->create([
            'name' => $data['name']
       ]); */
        $project = new Project();
        $project->name = $data['name'];
        $project->save();

        $project->users()->attach(Auth::id());

        return redirect(route('project.index'));
    }


    public function project_task_show($id)
    {

            $project = Project::select('id')->find($id);
            if (Auth::user()->can('view', $project)) {  // c помощью can вызывается функция политки тру или фолс
                return view('project.show', ['project' => $project]);
            } else {
                return redirect(route('project.index'));
            }
        }



    /*public function task.show($id, $task_id)
    {

        $project = Project::select('id', 'name')->find($id);
        $task = $project->tasks()->find($task_id);
        if (Auth::user()->can('view', $project)) {
            return view('project.show', ['project' => $project, 'task' => $task]);
        } else {
            return redirect(route('project.index'));
        }
    }*/
    }


