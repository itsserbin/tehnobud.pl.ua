<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push(env('APP_NAME'), route('index'));
});

Breadcrumbs::for('services', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Послуги', route('service'));
});

Breadcrumbs::for('about-us', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Про нас', route('about-us'));
});

Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Контакти', route('contact'));
});

Breadcrumbs::for('building', function (BreadcrumbTrail $trail, \App\ReadModels\Building $building) {
    $trail->parent('index');
    $trail->push($building['name'], route('building', $building['slug']));
});