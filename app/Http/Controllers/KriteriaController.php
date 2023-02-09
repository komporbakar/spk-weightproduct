<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(){
        return view('pages.kriteria',[
            'kriteria' => Kriteria::all(),
            'title' => 'Kriteria'
        ]);
    }
}
