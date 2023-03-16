<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('pages.kriteria.kriteria',[
            'kriteria' => Kriteria::all(),
            'title' => 'Kriteria'
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
        $data = $request->all();
        $success = Kriteria::create($data);

        if($success){
            Alert::success('Data Berhasil ditambahkan', 'Success Message');
            return redirect()->route('kriteria.index');
        } else {
            return redirect()->route('kriteria.index');

        }

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
        return view('pages.kriteria.edit',[
            'kriteria' => Kriteria::findOrFail($id),
        ]);
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
        $data = $request->all();

        $item = Kriteria::findOrFail($id);

        $update = $item->update($data);

        if($update){
            Alert::success('Data Berhasil di Update','success message');
            return redirect()->route('kriteria.index');
        } else{
            Alert::error('Data gagal di Hapus');
            return redirect()->route('kriteria.index');
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
        $item = Kriteria::findorFail($id);
        $delete = $item->delete();

        if ($delete) {
            Alert::success('Data Berhasil di Hapus','success message');
            return redirect()->route('kriteria.index');
        } else {
            Alert::error('Data gagal di Hapus');
            return redirect()->route('kriteria.index');
        }
    }
}
