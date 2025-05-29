<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::view('/', 'home');
Route::view('/about', 'about');
// Route::get('/contact', function () {
//     return view('contact');
// });
Route::view('/contact', 'contact');

/////// To show a slug
// Route::get('/jobs/{post:slug}', function (Post $post)

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });
Route::resource('jobs', JobController::class);
// Route::resource('jobs', JobController::class, [
//     'except' => ['edit']
//     // 'only' => ['index', 'show', 'store', 'update', 'destroy']

// ]);


//AUTH
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
