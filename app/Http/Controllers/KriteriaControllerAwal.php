<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
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

    public function show()
    {

    }

    public function edit($id)
    {
        $kriteria = Kriteria::firstOrFail($id);
        return view('pages.kriteria',[
            'kriteria' => $kriteria
        ]);
    }

    public function update()
    {
        
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Kriteria::create($data);

        return redirect()->route('kriteria.index');
    }
}
