<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaCtrl;
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
    return view('canvas');
});

Route::get('/home', [MangaCtrl::class, 'getMangaCtrl']);
Route::get('/serie/create', function () {
    return view('serie');
});
Route::post('/serie/create', [MangaCtrl::class, 'createSerie'])->name('createSerie');
Route::get('/series/{id}/characters', [MangaCtrl::class, 'getPersoClickable'])->name('series.characters');







