<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'tasks'; //на какую таблицу должна смотреть наша модель
    protected  $fillable=['title','preview_text','detail_text','project_id'];

//$miniss=$task->miniss
    public function  miniss()
    {
        return $this->hasMany(Mini::class);
    }
    public function status()
    {
     return $this->belongsTo((Status::class));
    }

    //public function users()
    //{
      //  return $this->belongsToMany(User::class);
    //}

    public function file()
    {
        return $this->hasone(File::class);
    }


    public function  projects()
    {
        return $this->belongsTo((Project::class));
    }
}
