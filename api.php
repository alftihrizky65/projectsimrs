<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AgamaController;
use App\Http\Controllers\Api\StatusPerkawinanController;
use App\Http\Controllers\Api\PendidikanController;
use App\Http\Controllers\Api\JenisPekerjaanController;
use App\Http\Controllers\Api\KategoriPasienController;
use App\Http\Controllers\Api\KelasRawatController;
use App\Http\Controllers\Api\PoliController;
use App\Http\Controllers\Api\RuangRawatController;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\KotaKabupatenController;
use App\Http\Controllers\Api\KecamatanController;
use App\Http\Controllers\Api\DesaKelurahanController;

/*
|--------------------------------------------------------------------------
| API Routes - SIMRS Awani Care
|--------------------------------------------------------------------------
|
| Semua routes API akan otomatis memiliki prefix '/api/'
| Contoh: Route::get('/agama', ...) akan menjadi http://localhost:8000/api/agama
|
*/

// Route untuk testing
Route::get('/', function () {
    return response()->json([
        'status' => true,
        'message' => 'API SIMRS Awani Care berjalan dengan baik!',
        'version' => '1.0.0',
        'timestamp' => now()
    ]);
});

// ==========================================
// ROUTES MASTER DATA
// ==========================================

// 1. Master Agama
Route::apiResource('agama', AgamaController::class);

// 2. Master Status Perkawinan
Route::apiResource('status-perkawinan', StatusPerkawinanController::class);

// 3. Master Pendidikan
Route::apiResource('pendidikan', PendidikanController::class);

// 4. Master Jenis Pekerjaan
Route::apiResource('jenis-pekerjaan', JenisPekerjaanController::class);

// 5. Master Kategori Pasien
Route::apiResource('kategori-pasien', KategoriPasienController::class);

// 6. Master Kelas Rawat
Route::apiResource('kelas-rawat', KelasRawatController::class);

// 7. Master Poli
Route::apiResource('poli', PoliController::class);

// 8. Master Ruang Rawat
Route::apiResource('ruang-rawat', RuangRawatController::class);

// 9. Master Provinsi
Route::apiResource('provinsi', ProvinsiController::class);

// 10. Master Kota/Kabupaten
Route::apiResource('kota-kabupaten', KotaKabupatenController::class);

// 11. Master Kecamatan
Route::apiResource('kecamatan', KecamatanController::class);

// 12. Master Desa/Kelurahan
Route::apiResource('desa-kelurahan', DesaKelurahanController::class);

/*
|--------------------------------------------------------------------------
| PENJELASAN apiResource
|--------------------------------------------------------------------------
|
| Route::apiResource() otomatis membuat 5 endpoint:
|
| GET    /api/agama              → index()   (Ambil semua data)
| GET    /api/agama/{id}         → show()    (Ambil data by ID)
| POST   /api/agama              → store()   (Tambah data baru)
| PUT    /api/agama/{id}         → update()  (Update data)
| DELETE /api/agama/{id}         → destroy() (Hapus data)
|
*/