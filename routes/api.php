<?php


use App\Http\Controllers\DelegationController;
use App\Http\Controllers\MoughataaController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\RegionController;

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\PeroidController;

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('regions', RegionController::class);
Route::apiResource('entities', EntityController::class);
Route::apiResource('declarations', DeclarationController::class);
Route::apiResource('moughataas', MoughataaController::class);
Route::apiResource('delegations', DelegationController::class);
