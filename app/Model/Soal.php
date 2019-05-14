<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    //
    protected $table = 'soal';
    protected $fillable = ['topik_id','title'];
}
