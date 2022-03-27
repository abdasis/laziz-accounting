<?php

use App\Http\Livewire\Pages\Cost\Create;
use App\Http\Livewire\Pages\Cost\Edit;
use App\Http\Livewire\Pages\Cost\Index;
use App\Http\Livewire\Pages\Cost\Show;
use App\Http\Livewire\Pages\Report\ReportCreate;
use App\Http\Livewire\Pages\Report\ReportEdit;
use App\Http\Livewire\Pages\Report\ReportIndex;
use App\Http\Livewire\Pages\Report\ReportShow;
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
    return redirect('/login');
});
Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'contacts'], function(){
        Route::get('/', \App\Http\Livewire\Pages\Contact\Index::class)->name('contacts.index');
        Route::get('create', \App\Http\Livewire\Pages\Contact\Create::class)->name('contacts.create');
        Route::get('edit/{contact}', \App\Http\Livewire\Pages\Contact\Edit::class)->name('contacts.edit');
        Route::get('show/{contact}', \App\Http\Livewire\Pages\Contact\Show::class)->name('contacts.show');
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

    Route::group(['prefix' => 'payment'], function (){
        Route::get('/', \App\Http\Livewire\Pages\Payment\Index::class)->name('payment.index');
        Route::get('create/{purchase}', \App\Http\Livewire\Pages\Payment\Create::class)->name('payment.create');
        Route::get('edit/{payment}', \App\Http\Livewire\Pages\Payment\Edit::class)->name('payment.edit');
        Route::get('show/{payment}', \App\Http\Livewire\Pages\Payment\Show::class)->name('payment.show');
    });

    Route::group(['prefix' => 'sales'], function (){
        Route::get('/', \App\Http\Livewire\Pages\Sales\Index::class)->name('sales.index');
        Route::get('create', \App\Http\Livewire\Pages\Sales\Create::class)->name('sales.create');
        Route::get('edit/{sale}', \App\Http\Livewire\Pages\Sales\Edit::class)->name('sales.edit');
        Route::get('show/{sale}', \App\Http\Livewire\Pages\Sales\Show::class)->name('sales.show');
    });

    Route::group(['prefix' => 'category-account'], function (){
        Route::get('/', \App\Http\Livewire\Pages\AccountCategory\Index::class)->name('category-account.index');
    });

    Route::group(['prefix' => 'products'], function (){
        Route::get('/', \App\Http\Livewire\Pages\Product\Index::class)->name('products.index');
        Route::get('create', \App\Http\Livewire\Pages\Product\Create::class)->name('products.create');
        Route::get('edit/{product}', \App\Http\Livewire\Pages\Product\Edit::class)->name('products.edit');
        Route::get('show/{product}', \App\Http\Livewire\Pages\Product\Show::class)->name('products.show');
    });

    Route::group(['prefix' => 'cost'], function (){
        Route::get('/', Index::class)->name('cost.index');
        Route::get('create', Create::class)->name('cost.create');
        Route::get('edit/{cost}', Edit::class)->name('cost.edit');
        Route::get('show/{cost}', Show::class)->name('cost.show');
    });

    Route::group(['prefix' => 'reports'], function (){
        Route::get('/', ReportIndex::class)->name('reports.index');
        Route::get('create', ReportCreate::class)->name('reports.create');
        Route::get('edit/{report}', ReportEdit::class)->name('reports.edit');
        Route::get('show/{report}', ReportShow::class)->name('reports.show');
        Route::get('sales-journal', \App\Http\Livewire\Pages\Journal\Sales::class)->name('reports.sales-journal');
        Route::get('purchases-journal', \App\Http\Livewire\Pages\Journal\Purchase::class)->name('reports.purchases-journal');
        Route::get('cash-in', \App\Http\Livewire\Pages\Journal\CashIn::class)->name('reports.cash-in');
        Route::get('cash-out', \App\Http\Livewire\Pages\Journal\CashOut::class)->name('reports.cash-out');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
