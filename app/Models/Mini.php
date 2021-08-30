<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mini extends Model
{
    use HasFactory;

    protected $table = 'miniss';
    protected $fillable = ['text'];


    public function  task()
    {
        return $this->belongsTo(Task::class);
    }

    }
