<?php

use App\Http\Controllers\UserClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\UserClient;

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
//

Route::get('UserClient', [UserClientController::class, 'index']);
Route::get('UserClient/{id}', [UserClientController::class, 'show']);
Route::post('UserClient', [UserClientController::class, 'store']);
Route::delete('UserClient/{id}', [UserClientController::class, 'deleteUser']);


