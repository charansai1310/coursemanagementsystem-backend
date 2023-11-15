<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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


//Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::middleware('auth:sanctum')->group(function () {
    // User
    Route::get('user', [UserController::class, 'user'])->middleware('auth:sanctum');
    Route::get('users', [UserController::class, 'index'])->middleware('auth:sanctum');
    Route::get('users/{user}', [UserController::class, 'show'])->middleware('auth:sanctum');
    Route::post('users', [UserController::class, 'store'])->middleware('auth:sanctum');
    Route::put('users/{user}', [UserController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('users/{course}', [UserController::class, 'delete'])->middleware('auth:sanctum');

    Route::get('users/{user}/courses', [UserController::class, 'courses'])->middleware('auth:sanctum');

    // Courses
    Route::get('courses', [CourseController::class, 'index']);
    Route::get('courses/{course}', [CourseController::class, 'show']);
    Route::post('courses', [CourseController::class, 'store']);
    Route::put('courses/{course}', [CourseController::class, 'update']);
    Route::delete('courses/{course}', [CourseController::class, 'delete']);

    Route::get('courses/{course}/announcements', [CourseController::class, 'announcements']);
    Route::get('courses/{course}/assessments', [CourseController::class, 'assessments']);
    Route::get('courses/{course}/assessments/{type}', [CourseController::class, 'assessmentsByType']);

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


    // Student Performance
    Route::get('submissions/{submission}', [SubmissionController::class, 'show']);
    Route::post('submissions', [SubmissionController::class, 'store']);
    Route::put('submissions/{submission}', [SubmissionController::class, 'update']);
    Route::delete('submissions/{submission}', [SubmissionController::class, 'delete']);

    // Announcements
    Route::get('announcements', [AnnouncementController::class, 'index']);
    Route::get('announcements/{announcement}', [announcementController::class, 'show']);
    Route::post('announcements', [announcementController::class, 'store']);
    Route::put('announcements/{announcement}', [AnnouncementController::class, 'update']);
    Route::delete('announcements/{announcement}', [AnnouncementController::class, 'delete']);
});
