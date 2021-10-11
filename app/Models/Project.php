<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model

{
    use  HasFactory;

    protected $table = 'project';//на какую таблицу должна смотреть наша модель

    protected $fillable = ['name','task'];

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
        // $project = App\User::find(1);
        //foreach ($project->tasks as $task)
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
