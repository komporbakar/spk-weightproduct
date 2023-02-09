<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

class AlternatifController extends Controller
{
    public function index(){
        $alternatif =  Alternatif::all();
        $title = 'Alternatif';
        return view('pages.alternatif',[
            'alternatif' => $alternatif,
            'title' => $title,
        ]);

    }
}
