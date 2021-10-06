<?php

namespace App\Models;

use http\Exception\UnexpectedValueException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends \Illuminate\Foundation\Auth\User
{
    use  HasFactory;

    protected $table = 'users';//на какую таблицу должна смотреть наша модель

    protected $fillable = ['name', 'surname', 'birthday', 'email', 'password'];

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function avatar()
    {
        return $this->hasOne(avatar::class);
    }
}

