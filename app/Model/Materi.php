<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Topik;
class Materi extends Model
{
    //
    protected $fillable = ['topik_id','title','content','slug'];
    protected $table = 'materi';

    public function topik()
    {
        # code...
        return $this->belongsTo(Topik::class);
    }

}
