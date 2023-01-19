<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PagesController;
use \App\Http\Controllers\PostsController;
use \App\Http\Controllers\ContactsController;
use \App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PagesController::class, 'index']);

Route::resource('/contacts', ContactsController::class);

Route::resource('/users', UsersController::class);

Auth::routes();

Route::get('/index', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

