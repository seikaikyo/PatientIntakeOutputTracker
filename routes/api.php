<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientRecordApiController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/patient-records-api', [PatientRecordApiController::class, 'index']);
Route::post('/patient-records-api', [PatientRecordApiController::class, 'store']);
Route::delete('/patient-records-api/{id}', [PatientRecordApiController::class, 'destroy']);
Route::post('/patient-records-api/delete-all', [PatientRecordApiController::class, 'deleteAll']);
