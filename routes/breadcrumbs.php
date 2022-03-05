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

//breadcrumb untuk customer
Breadcrumbs::for('customers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Semua Customer', route('customers.index'));
});

Breadcrumbs::for('customers.create', function (BreadcrumbTrail $trail) {
    $trail->parent('customers.index');
    $trail->push('Tambah Customer', route('customers.create'));
});

Breadcrumbs::for('customers.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('customers.index');
    $trail->push('Sunting Customer', route('customers.edit', $id));
});

Breadcrumbs::for('customers.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('customers.index');
    $trail->push('Detail Customer', route('customers.show', $id));
});


Breadcrumbs::for('suppliers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Semua Supplier', route('suppliers.index'));
});

Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Login', route('login'));
});
