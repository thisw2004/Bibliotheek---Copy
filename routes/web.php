<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MijnBoekenController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

//books komen in de home view (die verschijnt na succesvolle inlog),en gebruikt dus de homecontroller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('books',App\Http\Controllers\HomeController::class); //route voor alle methoden van de home controller
Route::resource('books',App\Http\Controllers\MijnBoekenController::class); //route voor alle methoden van de my book controller


Route::get('/myBooks', [App\Http\Controllers\MijnBoekenController::class, 'index'])->name('/books/mybooks');

//geselecteerde boek weergeven
Route::get('/{CatalogNumber}', [MijnBoekenController::class, 'show'])->name('show');

//boek lenen
Route::get('/loan/{CatalogNumber}', [MijnBoekenController::class, 'loan'])->name('loan');

//boek inleveren
Route::get('/handIn/{CatalogNumber}', [MijnBoekenController::class, 'handIn'])->name('HandIn');



//deze werkt nu ook nog op boeken bekijken,toepassen op boeken lenen
//Route::get('/{CatalogNumber}', [MijnBoekenController::class, 'loan'])->name('loan');
//route om het boek te bekijken (show) en om het boek uit te lenen (loan) lopen door elkaar