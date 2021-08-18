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

Route::get('userClient', [UserClientController::class, 'index']);
Route::get('userClient/{id}', [UserClientController::class, 'show']);
Route::post('userClient', [UserClientController::class, 'store']);
Route::delete('userClient/{id}', [UserClientController::class, 'deleteUser']);


