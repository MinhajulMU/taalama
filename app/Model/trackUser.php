<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class trackUser extends Model
{
    //
    protected $table = 'track_user';
    protected $fillable = ['topik_id','user_id','score'];
}
