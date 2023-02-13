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
            'name' => $request->name,
            'jenis' => mt_rand(1,6),
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
            'name' => ['required'],
        ]);
        $alternatif =  Alternatif::findOrFail($id);
        $alternatif->update([
            'name' => $request->name,
        ]);

        return redirect()->route('alternatif.index');
    }
}
