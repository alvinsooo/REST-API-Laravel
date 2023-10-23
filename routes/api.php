<?php

use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([ 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::apiResource('students', StudentController::class);
    Route::post('import-students', [StudentController::class, 'importStudents']) -> name('import');
    Route::post('delete-students', [StudentController::class, 'deleteStudents']) -> name('delete');
    Route::post('update-students', [StudentController::class, 'updateStudents']) -> name('update');
});
