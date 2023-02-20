<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'kode', 'name', 'bobot', 'type'
    ];

    public function subkriteria()
    {
        return $this->hasMany(SubKriteria::class);
    }

    public function alternatif()
	{
		return $this->belongsToMany(Alternatif::class)->withPivot('nilai');
	}
}
