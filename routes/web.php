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
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'customers'], function (){
        Route::get('/', \App\Http\Livewire\Pages\Customers\Index::class)->name('customers.index');
        Route::get('show/{customer}', \App\Http\Livewire\Pages\Customers\Show::class)->name('customers.show');
    });

    Route::group(['prefix' => 'suppliers'], function (){
        Route::get('/', \App\Http\Livewire\Pages\Suppliers\Index::class)->name('suppliers.index');
        Route::get('show/{supplier}', \App\Http\Livewire\Pages\Suppliers\Show::class)->name('suppliers.show');
    });

    Route::group(['prefix' => 'accounts'], function (){
        Route::get('/', \App\Http\Livewire\Pages\Account\Index::class)->name('accounts.index');
        Route::get('create', \App\Http\Livewire\Pages\Account\Create::class)->name('accounts.create');
        Route::get('edit/{account}', \App\Http\Livewire\Pages\Account\Edit::class)->name('accounts.edit');
        Route::get('show/{account}', \App\Http\Livewire\Pages\Account\Show::class)->name('accounts.show');
    });

    Route::group(['prefix' => 'purchases'], function (){
        Route::get('/', \App\Http\Livewire\Pages\Purchase\Index::class)->name('purchases.index');
        Route::get('create', \App\Http\Livewire\Pages\Purchase\Create::class)->name('purchases.create');
        Route::get('edit/{purchase}', \App\Http\Livewire\Pages\Purchase\Edit::class)->name('purchases.edit');
        Route::get('show/{purchase}', \App\Http\Livewire\Pages\Purchase\Show::class)->name('purchases.show');
    });

    Route::group(['prefix' => 'category-account'], function (){
        Route::get('/', \App\Http\Livewire\Pages\AccountCategory\Index::class)->name('category-account.index');
    });

    Route::group(['prefix' => 'employees'], function (){
        Route::get('/', \App\Http\Livewire\Pages\Employee\Index::class)->name('employees.index');
    });

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
