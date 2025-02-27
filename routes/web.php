<?php

use App\Http\Controllers\ProduitController;
use \App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/home', [UserController::class, 'index']);
Route::post('/produit/create', [ProduitController::class, 'store']);
Route::get('/produit/create', [ProduitController::class, 'create']);
Route::get('/produit/deatai/{id}', [ProduitController::class, 'readOne']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
