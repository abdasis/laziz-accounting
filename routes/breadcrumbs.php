<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
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
