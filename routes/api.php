<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/user', [AuthController::class, 'user'])->name('user');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('products', [ProductController::class, 'index'])->name('index');
Route::post('/products', [ProductController::class, 'save'])->name('save');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('edit1');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('delete');
