<?php 
 use App\Http\Controllers\Sous_groupeController; 
 use App\Http\Controllers\GroupeController; 
 use App\Http\Controllers\FieldController; 
 use App\Http\Controllers\FormController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\PeroidController;
use App\Http\Controllers\RegionController;

use App\Http\Controllers\CultureController;
use App\Http\Controllers\MoughataaController;
use App\Http\Controllers\CollectionController;

use App\Http\Controllers\DelegationController;
use App\Http\Controllers\DeclarationController;
use Modules\Authentification\Http\Controllers\PermissionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(
    function () {
        Route::apiResource('regions', RegionController::class);
        Route::apiResource('entities', EntityController::class);
        Route::apiResource('declarations', DeclarationController::class);
        Route::apiResource('moughataas', MoughataaController::class);
        Route::apiResource('delegations', DelegationController::class);
        Route::get('modules', [PermissionController::class, 'getmodules']);
        Route::post('permission/{user}', [PermissionController::class, 'updatePermission']);
        Route::get('users', [AuthentificationController::class, 'index']);
    }
);




Route::post('login', [AuthentificationController::class, 'login']);
Route::get('history', [PermissionController::class, 'getHistoryConnexion']);
Route::apiResource('forms', FormController::class); 
Route::apiResource('fields', FieldController::class); 
Route::apiResource('groupes', GroupeController::class); 
Route::apiResource('sous_groupes', Sous_groupeController::class); 
