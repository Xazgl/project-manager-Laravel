<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'files';//на какую таблицу должна смотреть наша модель


}
