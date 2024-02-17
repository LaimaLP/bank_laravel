<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController as Account;
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
    Route::get('/', [Client::class, 'index'])->middleware(['role:admin|employee|user'])->name('index'); 
    Route::get('/create', [Client::class, 'create'])->middleware(['role:admin|employee'])->name('create'); 
    Route::post('/', [Client::class, 'store'])->middleware(['role:admin|employee'])->name('store'); 
    Route::get('/{client}', [Client::class, 'show'])->middleware(['role:admin|employee|user'])->name('show'); 
    Route::get('/{client}/edit', [Client::class, 'edit'])->middleware(['role:admin|employee'])->name('edit'); 
    Route::put('/{client}', [Client::class, 'update'])->middleware(['role:admin|employee'])->name('update'); 
    Route::get('/{client}/delete', [Client::class, 'delete'])->middleware(['role:admin|employee'])->name('delete');  
    Route::delete('/{client}', [Client::class, 'destroy'])->middleware(['role:admin|employee'])->name('destroy');
});

Route::prefix('accounts')->name('accounts-')->group(function () {
    Route::get('/transfer', [Account::class, 'transfer'])->middleware(['role:admin|employee'])->name('transfer'); 
    Route::get('/create', [Account::class, 'create'])->middleware(['role:admin|employee'])->name('create'); 
    Route::get('/{account}', [Account::class, 'show'])->middleware(['role:admin|employee|user'])->name('show'); 
    Route::get('/{account}/edit', [Account::class, 'edit'])->middleware(['role:admin|employee'])->name('edit'); 
    Route::get('/{account}/delete', [Account::class, 'delete'])->middleware(['role:admin|employee'])->name('delete');  


    
    Route::put('/transfer', [Account::class, 'transferUpdate'])->middleware(['role:admin|employee'])->name('transferUp');
    Route::put('/{account}', [Account::class, 'update'])->middleware(['role:admin|employee'])->name('update'); 
    Route::put('/', [Account::class, 'taxes'])->middleware(['role:admin'])->name('taxes'); 
    Route::post('/', [Account::class, 'store'])->middleware(['role:admin|employee'])->name('store'); 
    Route::delete('/{account}', [Account::class, 'destroy'])->middleware(['role:admin|employee'])->name('destroy');
    
});





Route::get('/bankas', function () {
    return 'Cia nuguls bankas';
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
