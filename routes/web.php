<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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
Route::get('/{any?}', [ProductController::class, 'dashboard'])->name('dashboard')->where('any', '^(?!api).*$');
// Route::post('products', [CatalogController::class, 'update'])->name('update');







// Route::get('/usuarios', [UsuariosController::class, 'index']);
// Auth::routes(['verify'->true]);

Route::middleware('auth:admins')->prefix('admins')->group(function (){
    Route::get('/catalog/add-product', [CatalogController::class, 'addProduct'])->name('product.add');
    Route::post('/catalog/add-product', [CatalogController::class, 'saveProduct'])->name('save.product');
    Route::get('/catalog/list-product', [CatalogController::class, 'listProduct'])->name('list.product');
    Route::get('/catalog/edit/{id}', [CatalogController::class, 'editProduct'])->name('edit');
    Route::delete('/catalog/delete-product/{id}', [CatalogController::class, 'deleteProduct'])->name('product.delete');
    Route::put('/catalog/update-product/{id}', [CatalogController::class, 'updateProduct'])->name('product.update');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});
// Route::get('/catalog/add-product', [CatalogController::class, 'addProduct'])->name('product.add')->middleware('auth:admins');
// Route::post('/catalog/add-product', [CatalogController::class, 'saveProduct'])->name('save.product')->middleware('auth:admins');
// Route::get('/catalog/list-product', [CatalogController::class, 'listProduct'])->name('list.product')->middleware('auth:admins');
// Route::get('/catalog/edit/{id}', [CatalogController::class, 'editProduct'])->name('edit')->middleware('auth:admins');
// Route::get('/catalog/delete-product/{id}', [CatalogController::class, 'deleteProduct'])->name('product.delete')->middleware('auth:admins');
// Route::post('/catalog/update-product', [CatalogController::class, 'updateProduct'])->name('product.update')->middleware('auth:admins');


Route::get('/admin/login-admin', [AdminController::class, 'index'])->name('admin.login')->middleware('guest');
Route::post('/admin/login-admin', [AdminController::class, 'authAdm'])->name('auth.adm')->middleware('guest');
Route::post('/admin/login-admin', [AdminController::class, 'checkLogin'])->name('check.login');
Route::get('/admin/create-loginadm', [AdminController::class, 'createAdm'])->name('create.login');
Route::post('/admin/create-loginadm', [AdminController::class, 'saveAdm'])->name('save.admin');
/*Route::post('/admin/login-admin', [AdminController::class, 'loginadm.sucess'])->name('save.adm');*/


/*Route::get('/catalog', [CatalogController::class, 'index']);
Route::get('/catalog/create', [CatalogController::class, 'create']);
Route::post('/catalog', [CatalogController::class, 'store'])->name('catalog.store');
Route::get('/catalog/show/{$id}', [CatalogController::class, 'show']);
Route::get('/catalog/edit/{$id}', [CatalogController::class, 'edit']);
Route::post('/catalog/edit/{$id}', [CatalogController::class, 'update'])->name('edit_products');*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
