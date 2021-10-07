<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;
    protected $table = 'avatar';//на какую таблицу должна смотреть наша модель
    protected $fillable=['path','name','mime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
