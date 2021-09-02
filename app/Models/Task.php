<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks'; //на какую таблицу должна смотреть наша модель
    protected  $fillable=['title','preview_text','detail_text'];


    public function  miniss()
    {
        return $this->hasMany(Mini::class);
    }
    public function status()
    {
     return $this->belongsTo((Status::class));
    }
}
