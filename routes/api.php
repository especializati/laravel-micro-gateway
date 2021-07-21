<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CategoryController,
    CompanyController,
    EvaluationController,
    PermissionUserController,
    ResourceController
};
use App\Http\Controllers\Api\Auth\{
    AuthController,
    RegisterController
};

/**
 * Auth and Register
 */
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/me', [AuthController::class, 'me']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/resources', [ResourceController::class, 'index']);

/**
 * Users
 */
Route::post('/users/permissions', [PermissionUserController::class, 'addPermissionUser']);


Route::apiResource('/categories', CategoryController::class);

Route::post('/companies/{identify}/evaluations', [EvaluationController::class, 'store']);

Route::get('/companies', [CompanyController::class, 'index']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::get('/companies/{identify}', [CompanyController::class, 'show']);
Route::delete('/companies/{identify}', [CompanyController::class, 'destroy']);
Route::put('/companies/{identify}', [CompanyController::class, 'update']);

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});