<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AssessmentController;



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

// Courses
Route::get('courses', [CourseController::class, 'index']);
Route::get('courses/{course}', [CourseController::class, 'show']);
Route::post('courses', [CourseController::class, 'store']);
Route::put('courses/{course}', [CourseController::class, 'update']);
Route::delete('courses/{course}', [CourseController::class, 'delete']);

// Programs
Route::get('programs', [ProgramController::class, 'index']);
Route::get('programs/{program}', [ProgramController::class, 'show']);
Route::post('programs', [ProgramController::class, 'store']);
Route::put('programs/{program}', [ProgramController::class, 'update']);
Route::delete('programs/{program}', [ProgramController::class, 'delete']);

// Assessment
Route::get('assessments', [AssessmentController::class, 'index']);
Route::get('assessments/{assessment}', [AssessmentController::class, 'show']);
Route::post('assessments', [AssessmentController::class, 'store']);
Route::put('assessments/{assessment}', [AssessmentController::class, 'update']);
Route::delete('assessments/{assessment}', [AssessmentController::class, 'delete']);
