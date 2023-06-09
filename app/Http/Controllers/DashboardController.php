<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::count();
        $subkriteria = SubKriteria::count();
        $alternatif = Alternatif::count();

        return view('pages.index', [
            'kriteria' => $kriteria,
            'subkriteria'  => $subkriteria,
            'alternatif'  => $alternatif
        ]);
    }
}
