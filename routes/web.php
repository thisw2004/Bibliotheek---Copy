<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MijnBoekenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
/*wqd*/
Auth::routes();

//books komen in de home view (die verschijnt na succesvolle inlog),en gebruikt dus de homecontroller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//myBooks
Route::get('/myBooks', [App\Http\Controllers\MijnBoekenController::class, 'index'])->name('/books/mybooks');


//route to admin page,admin.blade.php
Route::get('/admin', [App\Http\Controllers\UserController::class, 'GetAllUsers']);

//display all recent lend books
Route::get('/JustBorrowed', [App\Http\Controllers\MijnBoekenController::class, 'JustBorrowed']);

//DYNAMIC ROUTES
//display selected book
Route::get('/{CatalogNumber}', [MijnBoekenController::class, 'show'])->name('show');

//lend book
Route::get('/loan/{CatalogNumber}', [MijnBoekenController::class, 'loan'])->name('loan');

//hand in book
Route::get('/handIn/{CatalogNumber}', [MijnBoekenController::class, 'handIn'])->name('HandIn');


//routes for the buttons on the admin pagina.
Route::get('/user/{id}', [UserController::class, 'GetUserById']);
