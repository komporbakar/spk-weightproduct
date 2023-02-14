<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

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

        Alternatif::create([
            'kode' => $request->kode,
            'name' => $request->name,
            'jenis' => $request->jenis,
        ]);
        return redirect()->route('alternatif.index');
    }

    public function edit($id){
        $alternatif = Alternatif::findorFail($id);
        return view('pages.alternatif.edit',[
            'alternatif' => $alternatif
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => ['required'],
            'name' => ['required'],
            'jenis' => ['required'],
        ]);
        $alternatif =  Alternatif::findOrFail($id);
        $alternatif->update([
            'kode' => $request->kode,
            'name' => $request->name,
            'jenis' => $request->jenisame,
        ]);

        return redirect()->route('alternatif.index');
    }

    public function destroy($id)
    {
        $subkriteria = Alternatif::findOrFail($id);
        $subkriteria->delete();

        return redirect()->back();
    }
}
