<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    //
    protected $fillable = ['topik_id','title','content','slug'];
    protected $table = 'materi';
}
