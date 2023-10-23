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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([ 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::middleware('auth:api')-> apiResource('students', StudentController::class);
    Route::middleware('auth:api')-> post('import-students', [StudentController::class, 'importStudents']) -> name('import');
    Route::middleware('auth:api')-> post('delete-students', [StudentController::class, 'deleteStudents']) -> name('delete');
    Route::middleware('auth:api')-> post('update-students', [StudentController::class, 'updateStudents']) -> name('update');
});