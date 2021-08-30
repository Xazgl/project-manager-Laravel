<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'statuses';//на какую таблицу должна смотреть наша модель

    public function tasks()
    {
        return $this->hasMany(Task::Class);


    }
}
