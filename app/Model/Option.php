<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Soal;
class Option extends Model
{
    //
    protected $table = 'option';
    protected $fillable = ['soal_id','title','icon'];

    public function soal()
    {
        # code...
        return $this->belongsTo(Soal::class);
    }
}
