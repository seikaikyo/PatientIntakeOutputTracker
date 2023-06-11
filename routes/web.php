<?php

use App\Models\PatientRecord;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientRecordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $records = PatientRecord::all();
    return view('welcome', ['records' => $records]);
});

Route::get('/', [PatientRecordController::class, 'index'])->name('index');
Route::post('/submit', [PatientRecordController::class, 'store']);
Route::delete('/delete/{id}', [PatientRecordController::class, 'destroy'])->name('delete-record');
Route::delete('/delete-all', [PatientRecordController::class, 'deleteAll'])->name('deleteAll');
Route::get('/download-report', 'App\Http\Controllers\PatientRecordController@downloadReport');
