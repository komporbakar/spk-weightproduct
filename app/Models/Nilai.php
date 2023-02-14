<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;


    public function kriteria(){
        return $this->belongsTo(Kriteria::class);
    }
}
