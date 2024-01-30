<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController as Member;
use App\Http\Controllers\ClientController as Client;
use App\Http\Controllers\ListingSearchController;
use App\Models\ListingSearch;

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
});


Route::prefix('clients')->name('clients-')->group(function () {
    Route::get('/', [CLient::class, 'index'])->name('index'); //rodysim sarasa
    Route::get('/', [CLient::class, 'filter'])->name('index'); //rodysim sarasa
    Route::get('/create', [CLient::class, 'create'])->name('create'); //creato forma
    Route::post('/', [CLient::class, 'store'])->name('store'); //uzsaugojimas
    Route::get('/{client}', [CLient::class, 'show'])->name('show'); //konkretus mechanikas
    Route::get('/{client}/edit', [CLient::class, 'edit'])->name('edit'); // jo redagavimo forma
    Route::put('/{client}', [CLient::class, 'update'])->name('update'); //redaguosim
    Route::get('/{client}/delete', [CLient::class, 'delete'])->name('delete');  //deleto confirmacija
    Route::delete('/{client}', [CLient::class, 'destroy'])->name('destroy');
    
});
// Route::get('/clients', [ListingSearchController::class, 'index']);
// Route::get('/clients/{listingSearch}', [ListingSearchController::class, 'show'])->search;






Route::get('/bankas', function () {
    return 'Cia nuguls bankas';
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
