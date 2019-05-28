<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Topik;
class Soal extends Model
{
    //
    protected $table = 'soal';
    protected $fillable = ['topik_id','title'];

    public function topik()
    {
        # code...
        return $this->belongsTo(Topik::class);
    }
}
