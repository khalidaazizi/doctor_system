<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\PatientVisitController;
use App\Http\Controllers\Api\DiseaseController;
use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\MedicineDetailController;
use App\Http\Controllers\Api\PatientLabController;
use App\Http\Controllers\Api\PatientVisitDiseaseController;
use App\Http\Controllers\Api\PatientVisitMedicationController;
use App\Http\Controllers\Api\PatientVisitTestController;
use App\Http\Controllers\Api\PatientHistoryController;

// مسیر پیش‌فرض لاراول برای دریافت اطلاعات یوزر لاگین‌شده
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user', function (Request $request) {
    return $request->user();
});



// مسیرهای API برای هر کنترلر
Route::apiResource('patients', PatientController::class);
Route::apiResource('visits', PatientVisitController::class);
Route::apiResource('diseases', DiseaseController::class);
Route::apiResource('medicines', MedicineController::class);
Route::apiResource('medicine-details', MedicineDetailController::class);
Route::apiResource('labs', PatientLabController::class);
Route::apiResource('visit-diseases', PatientVisitDiseaseController::class);
Route::apiResource('visit-medications', PatientVisitMedicationController::class);
Route::apiResource('visit-tests', PatientVisitTestController::class);




// routes/api.php
Route::get('patients/{id}/history', [PatientHistoryController::class, 'getPatientHistory']);













