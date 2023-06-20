<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/clients', [ClientController::class, 'index']) ;
Route::post('/clients', [ClientController::class, 'store']) ;
Route::get('/clients/search/{token}', [ClientController::class, 'search']) ;
Route::get('/clients/{id}', [ClientController::class, 'show']) ;
Route::put('/clients', [ClientController::class, 'update']) ;
Route::delete('/clients/delete/{id}', [ClientController::class, 'delete']) ;
