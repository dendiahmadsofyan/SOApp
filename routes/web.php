<?php

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

use App\Http\Controllers\web\ImportController;

Route::get('/import', [ImportController::class, 'showForm'])->name('import.form');
Route::post('/import', [ImportController::class, 'import'])->name('import.store');

use App\Http\Controllers\web\ProdukController;

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');

use App\Http\Controllers\web\SoController;
Route::get('/detail-so', [SoController::class, 'index'])->name('detail-so.index');
Route::post('/update-so-status', [SoController::class, 'updateSoStatus'])->name('detail-so.updateSoStatus');

use App\Http\Controllers\web\TConstController;

Route::get('/tconst', [TConstController::class, 'index'])->name('tconst.index');
Route::post('/tconst/update-status/{rkey}', [TConstController::class, 'updateStatus'])->name('tconst.updateStatus');

use App\Http\Controllers\web\InitialController;

Route::get('/initial', [InitialController::class, 'index'])->name('initial.index');
Route::post('/initial/update-status/{id}', [InitialController::class, 'updateStatus'])->name('initial.updateStatus');

use App\Http\Controllers\web\MasterDataController;
Route::resource('master_data', MasterDataController::class);
Route::get('/master-data/import', [MasterDataController::class, 'index'])->name('master_data.import');
Route::post('/master-data/import', [MasterDataController::class, 'import'])->name('master_data.import');
Route::get('/master-data', [MasterDataController::class, 'show'])->name('master_data.index');
Route::get('/master-data/create', [MasterDataController::class, 'create'])->name('master_data.create');
Route::post('/master-data/store', [MasterDataController::class, 'store'])->name('master_data.store');

use App\Http\Controllers\web\UserController;
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
Route::get('/users/reset-password/{id}', [UserController::class, 'resetPassword'])->name('user.resetPassword');
Route::get('/register', [UserController::class, 'create'])->name('user.create');
Route::post('/register', [UserController::class, 'store'])->name('user.store');

use App\Http\Controllers\web\ExportController;
Route::get('/export', [ExportController::class, 'index'])->name('export');
Route::post('/export/final', [ExportController::class, 'exportFinal']);
Route::post('/export/selisih', [ExportController::class, 'exportSelisih']);