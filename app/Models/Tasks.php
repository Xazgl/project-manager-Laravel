<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks'; //на какую таблицу должна смотреть наша модель

    public $timestamps= true;

    protected  $fillable=['title','detail_text','detail_text'];
}
