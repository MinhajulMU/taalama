<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    //
    protected $table = 'topik';
    protected $fillable = ['nama_topik','icon','deskripsi'];
}
