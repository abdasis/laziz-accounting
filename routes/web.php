<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Cost\Create;
use App\Http\Livewire\Cost\Edit;
use App\Http\Livewire\Cost\Index;
use App\Http\Livewire\Cost\Show;
use App\Http\Livewire\Journal\CashIn;
use App\Http\Livewire\Journal\CashOut;
use App\Http\Livewire\Journal\Purchase;
use App\Http\Livewire\Journal\Sales;
use App\Http\Livewire\Report\DetailLedger;
use App\Http\Livewire\Report\ReportCreate;
use App\Http\Livewire\Report\ReportEdit;
use App\Http\Livewire\Report\ReportIndex;
use App\Http\Livewire\Report\ReportLedger;
use App\Http\Livewire\Report\ReportShow;
use App\Http\Livewire\Sales\Invoice;
use App\Http\Livewire\Sales\Invoices;
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
        Route::get('/', \App\Http\Livewire\Contact\Index::class)->name('contacts.index');
        Route::get('create', \App\Http\Livewire\Contact\Create::class)->name('contacts.create');
        Route::get('edit/{contact}', \App\Http\Livewire\Contact\Edit::class)->name('contacts.edit');
        Route::get('show/{contact}', \App\Http\Livewire\Contact\Show::class)->name('contacts.show');
    });

    Route::group(['prefix' => 'accounts'], function (){
        Route::get('/', \App\Http\Livewire\Account\Index::class)->name('accounts.index');
        Route::get('create', \App\Http\Livewire\Account\Create::class)->name('accounts.create');
        Route::get('edit/{account}', \App\Http\Livewire\Account\Edit::class)->name('accounts.edit');
        Route::get('show/{account}', \App\Http\Livewire\Account\Show::class)->name('accounts.show');
    });

    Route::group(['prefix' => 'purchases'], function (){
        Route::get('/', \App\Http\Livewire\Purchase\Index::class)->name('purchases.index');
        Route::get('create', \App\Http\Livewire\Purchase\Create::class)->name('purchases.create');
        Route::get('edit/{purchase}', \App\Http\Livewire\Purchase\Edit::class)->name('purchases.edit');
        Route::get('show/{purchase}', \App\Http\Livewire\Purchase\Show::class)->name('purchases.show');
    });

    Route::group(['prefix' => 'payment'], function (){
        Route::get('/', \App\Http\Livewire\Payment\Index::class)->name('payment.index');
        Route::get('create/{purchase}', \App\Http\Livewire\Payment\Create::class)->name('payment.create');
        Route::get('edit/{payment}', \App\Http\Livewire\Payment\Edit::class)->name('payment.edit');
        Route::get('show/{payment}', \App\Http\Livewire\Payment\Show::class)->name('payment.show');
    });

    Route::group(['prefix' => 'sales'], function (){
        Route::get('/', \App\Http\Livewire\Sales\Index::class)->name('sales.index');
        Route::get('create', \App\Http\Livewire\Sales\Create::class)->name('sales.create');
        Route::get('edit/{sale}', \App\Http\Livewire\Sales\Edit::class)->name('sales.edit');
        Route::get('show/{sale}', \App\Http\Livewire\Sales\Show::class)->name('sales.show');
        Route::get('invoices/{sales}', Invoices::class)->name('sales.invoice');
    });

    Route::group(['prefix' => 'category-account'], function (){
        Route::get('/', \App\Http\Livewire\AccountCategory\Index::class)->name('category-account.index');
    });

    Route::group(['prefix' => 'products'], function (){
        Route::get('/', \App\Http\Livewire\Product\Index::class)->name('products.index');
        Route::get('create', \App\Http\Livewire\Product\Create::class)->name('products.create');
        Route::get('edit/{product}', \App\Http\Livewire\Product\Edit::class)->name('products.edit');
        Route::get('show/{product}', \App\Http\Livewire\Product\Show::class)->name('products.show');
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
        Route::get('sales-journal', Sales::class)->name('reports.sales-journal');
        Route::get('purchases-journal', Purchase::class)->name('reports.purchases-journal');
        Route::get('cash-in', CashIn::class)->name('reports.cash-in');
        Route::get('cash-out', CashOut::class)->name('reports.cash-out');
        Route::get('buku-besar', ReportLedger::class)->name('reports.ledger');
        Route::get('buku-besar/{kode}', DetailLedger::class)->name('reports.ledger-detail');
    });

    Route::group(['prefix' => 'asets'], function (){
        Route::get('/', \App\Http\Livewire\Aset\Index::class)->name('aset.index');
        Route::get('create', \App\Http\Livewire\Aset\Create::class)->name('aset.create');
        Route::get('edit/{aset}', \App\Http\Livewire\Aset\Edit::class)->name('aset.edit');
        Route::get('show/{aset}', \App\Http\Livewire\Aset\Show::class)->name('aset.show');
    });

    //route for system menu
    Route::group(['prefix' => 'staff'], function (){
        Route::get('/', \App\Http\Livewire\Staff\Index::class)->name('staff.index');
        Route::get('create', \App\Http\Livewire\Staff\Create::class)->name('staff.create');
        Route::get('edit/{staff}', \App\Http\Livewire\Staff\Edit::class)->name('staff.edit');
        Route::get('show/{staff}', \App\Http\Livewire\Staff\Show::class)->name('staff.show');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', Dashboard::class)->name('dashboard');
