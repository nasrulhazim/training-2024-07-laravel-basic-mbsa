<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

# Route define using Closure method
// Route::get('/', function () {
//     return view('welcome');
// });

# Route by using Controller (invokable)
Route::get('/', WelcomeController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
});

Route::get('/posts', function() {
    $posts = Post::with('user')->paginate(100);

    foreach ($posts as $post) {
        echo '<p>'.$post->title. ' - ' .$post->user->name. '</p>';
    }
});
