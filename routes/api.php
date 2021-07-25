<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\StudentGroupController;
use App\Http\Controllers\Api\StudentShiftController;
use App\Http\Controllers\Api\TuitionFeeCategoryAmountController;
use App\Http\Controllers\Api\TuitionFeeCategoryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\YearController;
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
Route::post('/admin/login',[AuthController::class,'login']);
Route::post('/student/login',[AuthController::class,'loginStudent']);
Route::post('/teacher/login',[AuthController::class,'loginTeacher']);
Route::middleware('auth:sanctum')->group(function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::prefix('users')->group(function () {
            Route::get('/all-user', [UserController::class, 'index'])->name('user.index');
            Route::post('/store', [UserController::class, 'store'])->name('user.store');
            Route::get('/show/{id}', [UserController::class, 'show'])->name('users.show');
            Route::patch('/update/{id}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        });
        Route::prefix('student-configure')->group(function () {
            Route::resource('classes',StudentClassController::class);
            Route::resource('years',YearController::class);
            Route::resource('shifts',StudentShiftController::class);
            Route::resource('groups',StudentGroupController::class);
            Route::resource('tuition-fee-category',TuitionFeeCategoryController::class);
            Route::resource('tuition-amount',TuitionFeeCategoryAmountController::class);
            Route::get('tuition-amount-details/{category_id}',[TuitionFeeCategoryAmountController::class,'getDetails']);

        });



    });
    Route::group(['middleware' => ['role:admin|student|teacher']], function () {
        Route::prefix('profile')->group(function () {
            Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');
            Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
            Route::patch('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

        });
    });

});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
