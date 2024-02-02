<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JwtMiddleware;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Initial\InitialController;
use App\Http\Controllers\StockOpname\SOController;

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

Route::get('/test-validation', function (Request $request){
    return response()->json('OK!',200);
});

Route::post('/login', LoginController::class);

Route::middleware(JwtMiddleware::class)->group(function () {
    Route::get('/checkToken', function () {
        return response()->json(['message' => 'Token Valid']); //message dan result 'Token Valid' dijadikan acuan di mobile app
    });

    Route::post('/initial/create', [InitialController::class, 'create']);
    Route::post('/initial/check', [InitialController::class, 'check']);

    Route::get('/stockopname/approval', [SOController::class, 'approval']);
    Route::get('/stockopname/cekmasterso', [SOController::class, 'cekmasterso']);
    Route::get('/stockopname/ambilidmasterso', [SOController::class, 'ambilidmasterso']);
    Route::post('/stockopname/scanbrg', [SOController::class, 'scanbrg']);

    

    // Dan lain-lain...
});

