<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model

{
    use  HasFactory,SoftDeletes;//SoftDeletes как добавить?

    protected $table = 'projects';//на какую таблицу должна смотреть наша модель

    protected $fillable = ['name'];



    public function tasks()
    {
        return $this->hasMany(Task::class);

    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
