<?php

use Illuminate\Http\Request;
use Modules\Authentification\Http\Controllers\RoleController;
use Modules\Authentification\Http\Controllers\PermissionController;
use Modules\Authentification\Http\Controllers\ResetPasswordController;
use Modules\Authentification\Http\Controllers\AuthentificationController;

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

Route::middleware('auth:api')->get('/authentification', function (Request $request) {
    return $request->user();
});



Route::get('/users', [AuthentificationController::class, 'index']);
Route::post('/login', [AuthentificationController::class, 'login']);
Route::post('/register', [AuthentificationController::class, 'register']);
Route::post('/users/update/{user}', [AuthentificationController::class, 'update']);
Route::post('/users/delete/{user}', [AuthentificationController::class, 'destroy']);
Route::get('/logout', [AuthentificationController::class, 'logout']);

Route::post('/forgotPassword', [ResetPasswordController::class, 'forgotPassword']);
Route::post('/resetPassword/{token}', [ResetPasswordController::class, 'resetPassword']);



Route::get('/modules', [PermissionController::class, 'getmodules']);

Route::post('/permission/{user}', [PermissionController::class, 'updatePermission']);
