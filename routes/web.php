<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\UserController;

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
})->name('accueil');

//* Route users
Route::get('signup', [UserController::class, 'create'])->name('users.create');
Route::post('signup', [UserController::class, 'store'])->name('users.create');

//* Route étudiants
Route::get('liste', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('liste/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');

Route::get('ajouter', [EtudiantController::class, 'create'])->name('etudiants.create')->middleware('auth');
Route::post('ajouter', [EtudiantController::class, 'store'])->name('etudiants.create')->middleware('auth');

Route::get('modifier/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiants.edit')->middleware('auth');
Route::put('modifier/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.edit')->middleware('auth');


Route::delete('liste/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.delete')->middleware('auth');


//* Route articles
Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('ecrire', [ArticleController::class, 'create'])->name('articles.create');
Route::post('ecrire', [ArticleController::class, 'store'])->name('articles.create');

Route::get('articles-edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('articles-edit/{article}', [ArticleController::class, 'update'])->name('articles.edit');

Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.delete');

//* Route fichiers
Route::get('fichiers', [FichierController::class, 'index'])->name('fichiers.index');

Route::get('televerser', [FichierController::class, 'create'])->name('fichiers.create');
Route::post('televerser', [FichierController::class, 'store'])->name('fichiers.create');

Route::get('fichiers/{nomFichier}', [FichierController::class, 'telecharger'])->name('fichiers.telecharger');

Route::get('fichiers-edit/{fichier}', [FichierController::class, 'edit'])->name('fichiers.edit');
Route::put('fichiers-edit/{fichier}', [FichierController::class, 'update'])->name('fichiers.edit');

Route::delete('fichiers/{fichier}', [FichierController::class, 'destroy'])->name('fichiers.delete');


//* Route Langue
Route::get('lang/{locale}', [LocalisationController::class, 'index'])->name('lang');

//* Route login
Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('login', [AuthController::class, 'authentification'])->name('login.authentification');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');