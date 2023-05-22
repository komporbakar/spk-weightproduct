<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AnalisaController extends Controller
{
    public function index(){
        $alternatifs = $this->proses();

        return view('pages.hasil.index', compact('alternatifs'));
    }

    public function print()
	{
		// abaikan garis error di bawah 'Pdf' jika ada.
		$pdf = Pdf::loadView('pages.laporan.cetak', ['data' => $this->proses()])->output();
		// return $pdf->download('Laporan.pdf');
		return response()->streamDownload(fn () => print($pdf), 'Laporan.pdf');
	}

    public function proses()
	{
		// Pengambilan data Alternatif & Kriteria
		$alternatifs = Alternatif::orderBy('kode')->get();
		$kriterias = Kriteria::orderBy('kode')->get();
		
		// pembuatan variable bobots yang berisi array kosong
		$bobots = [];

		// pengulangan kriteria yang telah diambil
		foreach ($kriterias as $kr) {
			// kriteria yang dilakukan perulangan berdasarkan bobot dibagi semua kriteria yang bobotnya dijumlahkan, akan di masukan ke variable bobots diatas
			$bobots[] = $kr->bobot / $kriterias->sum('bobot');
		}
		// sebuah kondisi ketika kriteria nya bertipe 1 atau BENEFIT setiap bobotnya dilakukan count dan dilakukan proses mengalikan nilai elemen terakhir -1, sehingga nilai elemen tersebut berubah menjadi nilai awal dikalikan dengan -1 (diubah menjadi negatif).
		if ($kr->type == 1){
			$bobots[count($bobots) -1] *= -1;
		}

		// penentuan matriks keputusan
		// pembuatan variable untuk menampung hasil matrixnya
		$matrix = [];
		// foreach ($alternatifs as $ka => $alt) untuk perulangan foreach ini digunakan untuk mengakses setiap elemen dalam array $alternatifs. Setiap elemen dalam array ini akan disimpan dalam variabel $alt, dan indeks dari elemen tersebut akan disimpan dalam variabel $ka
		foreach ($alternatifs as $ka => $alt) {
			// adalah prpses perulangan untuk setiap alternatif kriteria yang setiap elemen dalam array $alt->kriterianya akan disimpan dalam variable $kk, dan indeks dari elemen tersebut akan disimpan dalam variable $krit.
			foreach ($alt->kriteria as $kk => $krit) {
				// digunakan untuk menyimpan nilai dari $krit->pivot->nilai pada elemen matriks dengan baris $ka dan kolom $kk. untuk penjelasan $krit->pivot->nilai = adalah untuk mengisi nilai matrix yang dihasilkan dari data kriteria yang dihubungkan dengan data nilai
				$matrix[$ka][$kk] = $krit->pivot->nilai;
			}
		}
        
		// penentuan nilai vektor S
		$vectors = [];
		foreach ($matrix as $mat) {
			$vec = [];
			foreach ($mat as $km => $m) {
				$vec[] = pow($m, $bobots[$km]);
			}
			$vectors[] = array_product($vec);
		}
        
		// penentuan nilai bobot preferensi
		$prefs = [];
		$sigma_si = array_sum($vectors);
		foreach ($vectors as $vector) {
			$prefs[] = $vector / $sigma_si;
		}
        // return  $prefs;

		// masukkan hasil penilaian ke data alternatif
		foreach ($alternatifs as $key => $alternatif) {
			if(isset($prefs[$key])) {
				$alternatif->nilai = round($prefs[$key], 4);
			}else {
				$alternatif->nilai = 0;
			}
			// $alternatif->nilai = round($prefs[$key], 4);
		}

		return $alternatifs;
	}
}
