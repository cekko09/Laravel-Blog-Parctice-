<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

route::get('/',[HomeController::class, 'home']);
route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
route::get('/home', [HomeController::class, 'home'])->middleware(['auth', 'verified'])->name('home');

//  Route::get('/dashboard', function () {
//      return view('dashboard');
//  })

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/home', [HomeController::class, 'index'])->middleware(['auth','admin'])->name('adminhome');


route::get('/post_page',[AdminController::class, 'post_page']);
route::post('/add_post',[AdminController::class, 'add_post']);
route::get('/show_post',[AdminController::class, 'show_post']);
route::get('/delete_post/{id}',[AdminController::class, 'delete_post']);
route::get('/update_page/{id}',[AdminController::class, 'update_page']);
route::post('/update_post/{id}',[AdminController::class, 'update_post']);
route::get('/post_details/{id}',[HomeController::class, 'post_details']);
route::get('/create_post',[HomeController::class, 'create_post'])->middleware('auth');
route::post('/user_post',[HomeController::class, 'user_post'])->middleware('auth');
route::get('/my_post',[HomeController::class, 'my_post'])->middleware('auth');
route::get('/my_post_del/{id}',[HomeController::class, 'my_post_del'])->middleware('auth');
route::get('/post_update_page/{id}',[HomeController::class, 'post_update_page'])->middleware('auth');
route::post('/update_post_data/{id}',[HomeController::class, 'update_post_data'])->middleware('auth');







