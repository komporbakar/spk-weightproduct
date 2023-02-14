<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;


    // public function kriteria(){
    //     return $this->hasMany(Kriteria::class, 'id_kriteria', 'id');
    // }

    public function kriteria()
	{
		return $this->belongsToMany(Kriteria::class)->withPivot('nilai');
	}
}
