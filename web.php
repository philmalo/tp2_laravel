<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

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


Route::get('liste', [EtudiantController::class, 'index'])->name('etudiants.index');

Route::get('liste/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');

Route::get('ajouter', [EtudiantController::class, 'create'])->name('etudiants.create');
Route::post('ajouter', [EtudiantController::class, 'store'])->name('etudiants.create');

Route::get('modifier/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiants.edit');
Route::put('modifier/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.edit');


Route::delete('liste/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.delete');