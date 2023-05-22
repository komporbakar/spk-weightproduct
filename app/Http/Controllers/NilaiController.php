<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        $success = $alternatif->kriteria()->sync($data);
        if ($success) {
            Alert::success('Data Berhasil diubah', 'Success Message');
            return redirect()->route('nilai.index');
        } else {
            Alert::success('Data Berhasil diubah', 'Success Message');
            return redirect()->route('nilai.index');
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Alternatif::findOrFail($id);
        $delete = $nilai->delete();
        if($delete){
            Alert::success('Data Berhasil di Hapus','success message');
            return redirect()->back();
        } else{
            Alert::error('Data gagal di Hapus');
            return redirect()->back();
        }
    }
}
