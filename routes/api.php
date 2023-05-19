<?php

use App\Http\Controllers\api\archive\AllArchiveController;
use App\Http\Controllers\api\assessment\AllAssessmentController;
use App\Http\Controllers\api\assessment\CreateAssessmentController;
use App\Http\Controllers\api\assessment\FilterAssessmentController;
use App\Http\Controllers\api\assessment\MeAssessmentController;
use App\Http\Controllers\api\assessment_job\FindAssessmentJobController;
use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\RegisterController;
use App\Http\Controllers\api\kepala_ruangan\SemuaKepalaRuanganController;
use App\Http\Controllers\api\ketua_tim\SemuaKetuaTimController;
use App\Http\Controllers\api\role\GetAllRoleController;
use App\Http\Controllers\api\user\DeleteUserController;
use App\Http\Controllers\api\user\GetAllUserController;
use App\Http\Controllers\api\user\UbahPasswordUserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'],function(){
    Route::post('register',RegisterController::class);
    Route::post('login',LoginController::class);
});

Route::group(['prefix' => 'role'],function(){
    Route::post('all',GetAllRoleController::class);
});

Route::group(['prefix' => 'user'],function(){
    Route::post('all',GetAllUserController::class);
    Route::post('delete',DeleteUserController::class);
    Route::post('password/ubah',UbahPasswordUserController::class);
});

Route::group(['prefix' => 'kepalaruangan'],function(){
    Route::post('all',SemuaKepalaRuanganController::class);
});

Route::group(['prefix' => 'ketuatim'],function(){
    Route::post('all',SemuaKetuaTimController::class);
});

Route::group(['prefix' => 'assessment'],function(){
    Route::post('all',AllAssessmentController::class);
    Route::post('create',CreateAssessmentController::class);
    Route::post('filter',FilterAssessmentController::class);
    Route::post('me',MeAssessmentController::class);
});

Route::group(['prefix' => 'assessmentjob'],function(){
    Route::post('find',FindAssessmentJobController::class);
});

Route::group(['prefix' => 'archive'],function(){
    Route::post('all',AllArchiveController::class);
});
