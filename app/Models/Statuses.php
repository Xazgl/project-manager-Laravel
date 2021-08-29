<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'statuses';//на какую таблицу должна смотреть наша модель

}
