<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AnalisaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SubKriteriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => redirect()->route('login'));

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.index');
    })->name('dashboard');
});

// ROUTING ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Data Kriteria
    Route::resource('kriteria', KriteriaController::class)->parameters([
        'kriteria' => 'id']);

    Route::resource('alternatif', AlternatifController::class);
    Route::resource('nilai', NilaiController::class);

    Route::get('subkriteria', [SubKriteriaController::class, 'index'])->name('subkriteria.index');
    Route::get('/subkriteria/{id}/create', [SubKriteriaController::class, 'create'])->name('subkriteria.create');
    Route::get('subkriteria/{id}/edit', [SubKriteriaController::class, 'edit'])->name('subkriteria.edit');
    Route::get('subkriteria/{id}/update', [SubKriteriaController::class, 'update'])->name('subkriteria.update');
    Route::post('subkriteria/{id}/destroy', [SubKriteriaController::class, 'destroy'])->name('subkriteria.destroy');

    Route::post('/subkriteria/{id}/store', [SubKriteriaController::class, 'store'])
    ->name('subkriteria.store');

    Route::get('/hasil', [AnalisaController::class, 'index' ])->name('hasil');
    Route::get('/print', [AnalisaController::class, 'print' ])->name('print');
});
