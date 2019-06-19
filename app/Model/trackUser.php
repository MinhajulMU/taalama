<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Topik;
use App\Model\User;
class trackUser extends Model
{
    //
    protected $table = 'track_user';
    protected $fillable = ['topik_id','user_id','score'];
    public function topik()
    {
        # code...
        return $this->belongsTo(Topik::class);
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
}
