<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AnalisaController;
use App\Http\Controllers\KriteriaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('pages.index');
});

// Data Kriteria
Route::resource('kriteria', KriteriaController::class)->parameters([
    'kriteria' => 'id']);

Route::resource('alternatif', AlternatifController::class);
Route::get('subkriteria', [SubKriteriaController::class, 'index'])->name('subkriteria.index');
Route::get('/subkriteria/{id}/create', [SubKriteriaController::class, 'create'])->name('subkriteria.create');
Route::get('subkriteria/{id}/edit', [SubKriteriaController::class, 'edit'])->name('subkriteria.edit');
Route::get('subkriteria/{id}/destroy', [SubKriteriaController::class, 'destroy'])->name('subkriteria.destroy');

Route::post('/subkriteria/{id}/store', [SubKriteriaController::class, 'store'])
->name('subkriteria.store');

Route::get('/hasil', [AnalisaController::class, 'index' ]);
