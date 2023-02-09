<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AnalisaController extends Controller
{
    public function index(){
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $nama_alternatif = Alternatif::select('nama_alternatif')->get();

        $jml_alternatif = [];
        for($i =0; $i< count($nama_alternatif); $i++){
            $jml_alternatif[$i] = $nama_alternatif[$i];
        }
        return $jml_alternatif;
        // foreach($nama_alternatif as $alter => $value){
        //     foreach( $value as $key){
        //         $alt_name[$alter] = $key;
        //     }
        // }
        // return view('pages.kriteria',[
        //     'jml_alternatif' => $jml_alternatif
        // ]);
    }
}
