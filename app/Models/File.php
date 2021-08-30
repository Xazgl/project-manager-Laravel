<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';//на какую таблицу должна смотреть наша модель
    protected $fillable=['path','name','mime'];

}
