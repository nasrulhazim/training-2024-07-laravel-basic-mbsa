<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

# Route define using Closure method
Route::get('/hi', function () {
    return '<h1>hi</h1>';
});

Route::get('/hi-from-view', function () {
    return view('hi.from-view');
});

Route::get('/hi-konchiwa', function () {
    return view('hi.nihongo.konichiwa');
});

