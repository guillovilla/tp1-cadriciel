<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\DocumentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('/create/etudiant', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/create/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');

Route::middleware('auth')->group(function () {

//Routes pour Etudiant
Route::get('/edit/etudiant/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/edit/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');

//Routes pour Forum
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/create/forum', [ForumController::class, 'create'])->name('forum.create');
Route::post('/create/forum', [ForumController::class, 'store'])->name('forum.store');
Route::get('/edit/forum/{forum}', [ForumController::class, 'edit'])->name('forum.edit');
Route::put('/edit/forum/{forum}', [ForumController::class, 'update'])->name('forum.update');
Route::delete('/forum/{forum}', [ForumController::class, 'destroy'])->name('forum.delete');

//Routes pour Document
Route::get('/document', [DocumentController::class, 'index'])->name('document.index');
Route::get('/create/document', [DocumentController::class, 'create'])->name('document.create');
Route::post('/create/document', [DocumentController::class, 'store'])->name('document.store');
Route::get('/edit/document/{document}', [DocumentController::class, 'edit'])->name('document.edit');
Route::put('/edit/document/{document}', [DocumentController::class, 'update'])->name('document.update');
Route::delete('/document/{document}', [DocumentController::class, 'destroy'])->name('document.delete');

});

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');




    
