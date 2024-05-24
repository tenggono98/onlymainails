<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

Route::get('/',\App\Livewire\Homepage::class)->name('home');
Route::get('/book',\App\Livewire\Book::class)->name('book');



// Route::group(['middleware'=>'role:admin'],function () {

//     Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// });


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        // Route::view('dashboard', 'dashboard')
        // ->middleware(['auth', 'verified'])
        // ->name('admin.dashboard');


        Route::get('/dashboard',\App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');


    });
});



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// For Google Login
Route::get('oauth/google', [\App\Http\Controllers\OauthController::class, 'redirectToProvider'])->name('oauth.google');
Route::get('oauth/google/callback', [\App\Http\Controllers\OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');




require __DIR__.'/auth.php';
