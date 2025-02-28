<?php

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategoriController;
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

// // Produit--- --- ---
/*|*/   // create--- C
/*|*/   Route::post('/produit/create', [ProduitController::class, 'store']);
/*|*/   Route::get('/produit/create', [ProduitController::class, 'create']);
/*|*/   
/*|*/   // read--- R
/*|*/   Route::get('/home', [UserController::class, 'index']);
/*|*/   Route::get('/produits', [ProduitController::class, 'readAll']);
/*|*/   Route::get('/produit/deatai/{id}', [ProduitController::class, 'readOne']);
/*|*/   
/*|*/   // update--- U
/*|*/   Route::get('/produit/update/{id}', [ProduitController::class, 'update']);
/*|*/   
/*|*/      // delet--- D
/*|*/    Route::get('/produits/delete', [ProduitController::class, 'deleteAll']);
/*|*/   Route::get('/produit/delete/{id}', [ProduitController::class, 'deleteOne']);
//|//  --- --- ---


// // categori--- --- ---
/*|*/   // create--- C
/*|*/   Route::post('/categori/create', [CategoriController::class, 'store']);
/*|*/   Route::get('/categori/create', [CategoriController::class, 'create']);
/*|*/   
/*|*/   // read--- R
/*|*/   Route::get('/categoris', [CategoriController::class, 'readAll']);
/*|*/   Route::get('/categori/deatai/{id}', [CategoriController::class, 'readOne']);
/*|*/   
/*|*/   // update--- U
/*|*/   Route::get('/categori/update/{id}', [CategoriController::class, 'update']);
/*|*/   
/*|*/      // delet--- D
/*|*/    Route::get('/categoris/delete', [CategoriController::class, 'deleteAll']);
/*|*/   Route::get('/categori/delete/{id}', [CategoriController::class, 'deleteOne']);
//|//  --- --- ---


// // categoris_Produit--- --- ---
/*|*/   // create--- C
/*|*/   Route::post('/produit/categori/add', [ProduitController::class, 'addCategoris']);
/*|*/   
/*|*/   
/*|*/   // read--- R
/*|*/   Route::get('/produit/categori/add', [ProduitController::class, 'categoris']);
/*|*/   
/*|*/   // update--- U
/*|*/   Route::get('/categori/update/{id}', [CategoriController::class, 'update']);
/*|*/   
/*|*/      // delet--- D
/*|*/    Route::get('/categoris/delete', [CategoriController::class, 'deleteAll']);
/*|*/   Route::get('/categori/delete/{id}', [CategoriController::class, 'deleteOne']);
//|//  --- --- ---








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
