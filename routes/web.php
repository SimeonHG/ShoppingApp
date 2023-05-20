<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PagesController;
use \App\Http\Controllers\PostsController;
use \App\Http\Controllers\CardsController;
use \App\Http\Controllers\ItemsController;
use \App\Http\Controllers\ContactsController;
use \App\Http\Controllers\LabelsController;
use \App\Http\Controllers\RequestsController;
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

Route::get('/contacts/popular', [ContactsController::class, 'popular'])->name('popular');

Route::get('/contacts/sameFirstName', [ContactsController::class, 'sameFirstName'])->name('sameFirstName');
Route::post('/contacts/getSameFirstName', [ContactsController::class, 'getSameFirstName'])->name('getSameFirstName');

Route::get('/contacts/sameLastName', [ContactsController::class, 'sameLastName'])->name('sameLastName');
Route::post('/contacts/getSameLastName', [ContactsController::class, 'getSameLastName'])->name('getSameLastName');

Route::get('/contacts/givenContact', [ContactsController::class, 'givenContact'])->name('givenContact');
Route::post('/contacts/getGivenContact', [ContactsController::class, 'getGivenContact'])->name('getGivenContact');

Route::resource('/contacts', ContactsController::class);

Route::post('/labels/{id}/attachContact', [LabelsController::class, 'attachContact'])->name('attachContact');
Route::post('/labels/{id}/detachContact', [LabelsController::class, 'detachContact'])->name('detachContact');

Route::resource('/labels', LabelsController::class);

Route::resource('/users', UsersController::class);

Route::resource('/cards', CardsController::class);

Route::resource('/items', ItemsController::class);


Route::resource('/requests', RequestsController::class);

Auth::routes();

Route::get('/index', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

