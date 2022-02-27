<?php

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

Route::group(['prefix' => 'customers'], function (){
    Route::get('/', \App\Http\Livewire\Pages\Customers\Index::class)->name('customers.index');
    Route::get('create', \App\Http\Livewire\Pages\Customers\Create::class)->name('customers.create');
    Route::get('edit/{customer}', \App\Http\Livewire\Pages\Customers\Edit::class)->name('customers.edit');
    Route::get('show/{customer}', \App\Http\Livewire\Pages\Customers\Show::class)->name('customers.show');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
