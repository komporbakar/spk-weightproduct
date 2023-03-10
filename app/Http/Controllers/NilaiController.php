<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public $alternatif;
	public $kriterias;
	public $nilai = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $nilai = Nilai::with(['kriteria'])->get();
        $alternatif = Alternatif::orderBy('kode')->get();
		$kriteria = Kriteria::orderBy('kode')->get();
        return view('pages.perhitungan.index', [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $kriteria = Kriteria::all();
    
        $alternatif_kriteria = $alternatif->kriteria()->get();
    
        $subkriteria_bobot = [];
        foreach ($kriteria as $k) {
            $subkriteria_bobot[$k->id] = $k->subkriteria()->pluck('bobot', 'id')->toArray();
        }
    
        return view('pages.perhitungan.edit', compact('alternatif', 'kriteria', 'alternatif_kriteria', 'subkriteria_bobot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->kriteria()->sync([]);

        $subkriteria_id = $request->input('subkriteria_id');

        $data = [];

        foreach ($subkriteria_id as $key => $value) {
            $subkriteria = SubKriteria::findOrFail($value);
            $data[$subkriteria->kriteria_id] = ['nilai' => $subkriteria->bobot];
        }

        $alternatif->kriteria()->sync($data);

        return redirect()->route('nilai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
