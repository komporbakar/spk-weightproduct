<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use RealRashid\SweetAlert\Facades\Alert;

class AlternatifController extends Controller
{
    public function index(){
        $alternatif =  Alternatif::all();
        $title = 'Alternatif';
        return view('pages.alternatif.index',[
            'alternatif' => $alternatif,
            'title' => $title,
        ]);

    }

    public function create(){
        return view('pages.alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $data = Alternatif::create([
            'kode' => $request->kode,
            'name' => $request->name,
            'jenis' => $request->jenis,
            'tingkat'   => $request->tingkat,
        ]);

        if($data) {
            Alert::Success('Data berhasil ditambahkan', 'Success Message');
            return redirect()->route('alternatif.index');
            ;
        } else {
            return redirect(route('alternatif.create'));
        }
    }

    public function edit($id){
        $alternatif = Alternatif::findorFail($id);
        return view('pages.alternatif.edit',[
            'alternatif' => $alternatif
        ]);
    }

    public function update(Request $request, $id)
    {
        
        $data = $request->all();
        $alternatif =  Alternatif::findOrFail($id);
        $update = $alternatif->update($data);

        if ($update) {
            Alert::success('Data Berhasil di Update','success message');
            return redirect()->route('alternatif.index');
        } else {
            Alert::error('Data gagal di Hapus');
            return redirect()->route('alternatif.index');
        }
        

    }

    public function destroy($id)
    {
        $subkriteria = Alternatif::findOrFail($id);
        $delete = $subkriteria->delete();
        if($delete){
            Alert::success('Data Berhasil di Hapus','success message');
            return redirect()->back();
        } else{
            Alert::error('Data gagal di Hapus');
            return redirect()->back();
        }
    }
}
