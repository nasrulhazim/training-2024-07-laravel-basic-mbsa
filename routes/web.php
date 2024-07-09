<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

# Route define using Closure method
// Route::get('/', function () {
//     return view('welcome');
// });

# Route by using Controller (invokable)
Route::get('/', WelcomeController::class);

# Route by using Controller (using custom method)
Route::get('/my-bayar', [
    LandingPageController::class,
    'myBayar'
]);

Route::get('/e-loyalty', [
    LandingPageController::class,
    'eLoyalty'
]);

Route::resource('users', UserController::class);


Route::get('/hi', function () {
    return '<h1>hi</h1>';
});

Route::get('/hi-from-view', function () {
    return view('hi.from-view');
});

Route::get('/hi-konchiwa', function () {
    return view('hi.nihongo.konichiwa');
});

