<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Login', route('login'));
});

Breadcrumbs::for('accounts.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Semua Akun', route('accounts.index'));
});

Breadcrumbs::for('category-account.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kategori Akun', route('category-account.index'));
});

Breadcrumbs::for('purchases.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pembelian', route('purchases.index'));
});

Breadcrumbs::for('purchases.create', function (BreadcrumbTrail $trail) {
    $trail->parent('purchases.index');
    $trail->push('Tambah Pembelian', route('purchases.create'));
});

Breadcrumbs::for('purchases.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('purchases.index');
    $trail->push('Detail Pembelian', route('purchases.show', $id));
});

Breadcrumbs::for('purchases.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('purchases.index');
    $trail->push('Edit Pembelian', route('purchases.edit', $id));
});

Breadcrumbs::for('contacts.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kontak', route('contacts.index'));
});

Breadcrumbs::for('contacts.create', function (BreadcrumbTrail $trail) {
    $trail->parent('contacts.index');
    $trail->push('Tambah Kontak', route('contacts.create'));
});

Breadcrumbs::for('contacts.edit', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('contacts.index');
    $trail->push('Edit Kontak', route('contacts.edit', $contact));
});

Breadcrumbs::for('contacts.show', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('contacts.index');
    $trail->push('Detail Kontak', route('contacts.show', $contact));
});

Breadcrumbs::for('sales.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Penjualan', route('sales.index'));
});

Breadcrumbs::for('sales.invoice', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('dashboard');
    $trail->push('Invoice', route('sales.invoice', $id));
});



Breadcrumbs::for('sales.create', function (BreadcrumbTrail $trail) {
    $trail->parent('sales.index');
    $trail->push('Tambah Penjualan', route('sales.create'));
});

Breadcrumbs::for('sales.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('sales.index');
    $trail->push('Detail Penjualan', route('sales.show', $id));
});

Breadcrumbs::for('sales.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('sales.index');
    $trail->push('Edit Penjualan', route('sales.edit', $id));
});

Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Produk', route('products.index'));
});

Breadcrumbs::for('products.create', function (BreadcrumbTrail $trail) {
    $trail->parent('products.index');
    $trail->push('Tambah Produk', route('products.create'));
});

Breadcrumbs::for('products.edit', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('products.index');
    $trail->push('Edit Produk', route('products.edit', $product));
});

Breadcrumbs::for('products.show', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('products.index');
    $trail->push('Detail Produk', route('products.show', $product));
});

Breadcrumbs::for('payment.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pembayaran', route('payment.index'));
});

Breadcrumbs::for('payment.create', function (BreadcrumbTrail $trail, $purchase) {
    $trail->parent('payment.index');
    $trail->push('Tambah Pembayaran', route('payment.create', $purchase));
});

Breadcrumbs::for('payment.edit', function (BreadcrumbTrail $trail, $payment) {
    $trail->parent('payment.index');
    $trail->push('Edit Pembayaran', route('payment.edit', $payment));
});

Breadcrumbs::for('cost.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Biaya', route('cost.index'));
});

Breadcrumbs::for('cost.create', function (BreadcrumbTrail $trail) {
    $trail->parent('cost.index');
    $trail->push('Tambah Biaya', route('cost.create'));
});

Breadcrumbs::for('cost.edit', function (BreadcrumbTrail $trail, $cost) {
    $trail->parent('cost.index');
    $trail->push('Edit Biaya', route('cost.edit', $cost));
});

Breadcrumbs::for('cost.show', function (BreadcrumbTrail $trail, $cost) {
    $trail->parent('cost.index');
    $trail->push('Detail Biaya', route('cost.show', $cost));
});

Breadcrumbs::for('reports.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Laporan', route('reports.index'));
});

Breadcrumbs::for('reports.ledger', function (BreadcrumbTrail $trail) {
    $trail->parent('reports.index');
    $trail->push('Buku Besar', route('reports.ledger'));
});


Breadcrumbs::for('reports.ledger-detail', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('reports.ledger');
    $trail->push('Buku Besar', route('reports.ledger-detail', $id));
});

Breadcrumbs::for('reports.create', function (BreadcrumbTrail $trail) {
    $trail->parent('reports.index');
    $trail->push('Tambah Laporan', route('reports.create'));
});

Breadcrumbs::for('reports.edit', function (BreadcrumbTrail $trail, $report) {
    $trail->parent('reports.index');
    $trail->push('Edit Laporan', route('reports.edit', $report));
});

Breadcrumbs::for('reports.show', function (BreadcrumbTrail $trail, $report) {
    $trail->parent('reports.index');
    $trail->push('Detail Laporan', route('reports.show', $report));
});

Breadcrumbs::for('reports.purchases-journal', function (BreadcrumbTrail $trail) {
    $trail->parent('reports.index');
    $trail->push('Laporan Kas Masuk', route('reports.cash-in'));
});

Breadcrumbs::for('reports.sales-journal', function (BreadcrumbTrail $trail) {
    $trail->parent('reports.index');
    $trail->push('Sales Journal', route('reports.cash-out'));
});

Breadcrumbs::for('accounts.create', function (BreadcrumbTrail $trail) {
    $trail->parent('accounts.index');
    $trail->push('Tambah Akun', route('accounts.create'));
});

Breadcrumbs::for('accounts.edit', function (BreadcrumbTrail $trail, $account) {
    $trail->parent('accounts.index');
    $trail->push('Edit Akun', route('accounts.edit', $account));
});

Breadcrumbs::for('accounts.show', function (BreadcrumbTrail $trail, $account) {
    $trail->parent('accounts.index');
    $trail->push('Detail Akun', route('accounts.show', $account));
});

Breadcrumbs::for('staff.index',  function(BreadcrumbTrail $trail){
    $trail->parent('dashboard', route('dashboard'));
    $trail->push('Semua Staff', route('staff.index'));
});

Breadcrumbs::for('staff.create', function (BreadcrumbTrail $trail){
    $trail->parent('staff.index');
    $trail->push('Tambah Staff', route('staff.create'));
});

Breadcrumbs::for('staff.edit', function(BreadcrumbTrail $trail, $id){
    $trail->parent('staff.index');
    $trail->push('Edit Staff', route('staff.edit', $id));
});

Breadcrumbs::for('staff.show', function (BreadcrumbTrail $trail, $id){
    $trail->parent('staff.index');
    $trail->push('Detail Staff', route('staff.show', $id));
});

Breadcrumbs::for('aset.index', function (BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Semua Aset', route('aset.index'));
});

Breadcrumbs::for('aset.create', function (BreadcrumbTrail $trail){
    $trail->parent('aset.index');
    $trail->push('Tambah Data Aset', route('aset.create'));
});

 Breadcrumbs::for('aset.edit', function (BreadcrumbTrail $trail, $id){
     $trail->parent('aset.index');
     $trail->push('Edit Data Aset', route('aset.edit'));
 });

 Breadcrumbs::for('aset.show', function (BreadcrumbTrail $trail, $id){
     $trail->parent('aset.index');
     $trail->push('Detail Data Aset', route('aset.show', $id));
 });
