<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    protected $table = 'option';
    protected $fillable = ['soal_id','title','icon'];
}
