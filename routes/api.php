<?php

use App\Http\Controllers\api\archive\AllArchiveController;
use App\Http\Controllers\api\assessment\AllAssessmentController;
use App\Http\Controllers\api\assessment\CreateAssessmentController;
use App\Http\Controllers\api\assessment\FilterAssessmentController;
use App\Http\Controllers\api\assessment\MeAssessmentController;
use App\Http\Controllers\api\assessment_data\AlergiController;
use App\Http\Controllers\api\assessment_data\AnalisisDataController;
use App\Http\Controllers\api\assessment_data\CatatanPerkembanganPasienController;
use App\Http\Controllers\api\assessment_data\EkonomiController;
use App\Http\Controllers\api\assessment_data\GetCatatanPerkembanganPasienController;
use App\Http\Controllers\api\assessment_data\GetDataPasienController;
use App\Http\Controllers\api\assessment_data\HasilPemeriksaanPenunjangController;
use App\Http\Controllers\api\assessment_data\IdentitasPasienController;
use App\Http\Controllers\api\assessment_data\KebutuhanEdukasiController;
use App\Http\Controllers\api\assessment_data\MasalahKeperawatanController;
use App\Http\Controllers\api\assessment_data\NyeriController;
use App\Http\Controllers\api\assessment_data\PerencanaanPemulanganPasienController;
use App\Http\Controllers\api\assessment_data\PsikoSosialSpiritualController;
use App\Http\Controllers\api\assessment_data\RiwayatKesehatanController;
use App\Http\Controllers\api\assessment_data\RiwayatPenggunaanObatController;
use App\Http\Controllers\api\assessment_data\StatusFisikAtauFisiologisController;
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

Route::group(['prefix' => 'assessment-data'],function(){
    Route::post('identitas-pasien',IdentitasPasienController::class);
    Route::post('riwayat-kesehatan',RiwayatKesehatanController::class);
    Route::post('status-fisik-fisiologis',StatusFisikAtauFisiologisController::class);
    Route::post('psiko-sosial-spiritual',PsikoSosialSpiritualController::class);
    Route::post('ekonomi',EkonomiController::class);
    Route::post('alergi',AlergiController::class);
    Route::post('nyeri',NyeriController::class);
    Route::post('kebutuhan-edukasi',KebutuhanEdukasiController::class);
    Route::post('perencanaan-pemulangan-pasien',PerencanaanPemulanganPasienController::class);
    Route::post('riwayat-penggunaan-obat',RiwayatPenggunaanObatController::class);
    Route::post('hasil-pemeriksaan-penunjang',HasilPemeriksaanPenunjangController::class);
    Route::post('analisis-data',AnalisisDataController::class);
    Route::post('masalah-keperawatan',MasalahKeperawatanController::class);
    Route::post('catatan-perkembangan-pasien',CatatanPerkembanganPasienController::class);

    Route::post('get-catatan-perkembangan-pasien',GetCatatanPerkembanganPasienController::class);
    Route::post('get-data-pasien',GetDataPasienController::class);
});

Route::group(['prefix' => 'assessmentjob'],function(){
    Route::post('find',FindAssessmentJobController::class);
});

Route::group(['prefix' => 'archive'],function(){
    Route::post('all',AllArchiveController::class);
});
