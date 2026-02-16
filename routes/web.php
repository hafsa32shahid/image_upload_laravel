<?php

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImagesController::class, 'fetch_image'])->name('image')->middleware('auth');

Route::get('image/create', function () {
    return view('create');
})->middleware(ValidUser::class);

Route::post('/image/create', [ImagesController::class, 'image_create'])
->name('image.create')->middleware(ValidUser::class);

// Show the edit form
Route::get('/image/{id}/edit', [ImagesController::class, 'edit'])->name('image.edit')
->middleware(ValidUser::class);

// Handle form submission (update)
Route::put('/image/{id}', [ImagesController::class, 'update'])->name('image.update')
->middleware(ValidUser::class);

// Delete route
Route::delete('/image/{id}', [ImagesController::class, 'delete'])->name('image.delete')
->middleware(ValidUser::class);


// for register screen
Route::get("auth/register",[UserController::class, "register"])->name('auth.register');
// save user
Route::post("auth/register",[UserController::class, "create"])->name('auth.create');

// login screen
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('auth/login', [UserController::class, 'authenticate'])->name('auth.login');
