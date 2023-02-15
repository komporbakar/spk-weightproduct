<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = ['kode','name','jenis'];

    public function kriteria()
	{
		return $this->belongsToMany(Kriteria::class)->withPivot('nilai');
	}
}
