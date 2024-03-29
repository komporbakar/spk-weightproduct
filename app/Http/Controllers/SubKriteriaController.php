<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = Kriteria::all();
        return view('pages.subKriteria.index',[
            'subkriteria' => $sub
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kriteria = Kriteria::find($id);
        return view('pages.subKriteria.create',[
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public $id_kriteria;
    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required'],
            'bobot' => ['required']
        ]);
        $kriteria = Kriteria::find($id);
		$success = $kriteria->subkriteria()->create([
            'name' => $request->name,
            'bobot' => $request->bobot
        ]);

        if($success){
            Alert::success('Data Berhasil ditambahkan', 'Success Message');
            return redirect()->back();
        } else {
            Alert::error('Data Gagal ditambahkan', 'Error Message');
            return redirect()->back();
        }
        return redirect()->back();
		$this->reset('name', 'bobot');
		$this->emit('saved');
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
    // public $id_kriteria;
    public function edit($id)
    {
        $subkriteria = Kriteria::find($id)->subkriteria()->get();
        $kriteria = Kriteria::find($id);
        // $kriteria = SubKriteria::find($this->id_kriteria);
        return view('pages.subKriteria.edit',compact('subkriteria','kriteria'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subkriteria = SubKriteria::findOrFail($id);
        $delete = $subkriteria->delete();

        if ($delete) {
            Alert::success('Data Berhasil di Hapus','success message');
            return redirect()->back();
        } else {
            Alert::error('Data gagal di Hapus');
            return redirect()->back();
        }

        return redirect()->back();
    }
}
