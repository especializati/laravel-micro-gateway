<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CategoryController,
    CompanyController,
    EvaluationController,
    PermissionUserController,
    ResourceController,
    UserController
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
Route::get('/users/{identify}/permissions', [PermissionUserController::class, 'getPermissionsUser']);
Route::delete('/users/permissions', [PermissionUserController::class, 'removePermissionUser']);
Route::post('/users/permissions', [PermissionUserController::class, 'addPermissionUser']);
Route::apiResource('/users', UserController::class);


Route::apiResource('/categories', CategoryController::class);

Route::post('/companies/{identify}/evaluations', [EvaluationController::class, 'store'])->middleware('auth_micro');

Route::get('/companies', [CompanyController::class, 'index'])->middleware('permission:visualizar_empresas');
Route::post('/companies', [CompanyController::class, 'store'])->middleware('permission:cadastrar_empresas');
Route::get('/companies/{identify}', [CompanyController::class, 'show'])->middleware('permission:visualizar_empresa');
Route::delete('/companies/{identify}', [CompanyController::class, 'destroy'])->middleware('permission:deletar_empresa');
Route::put('/companies/{identify}', [CompanyController::class, 'update'])->middleware('permission:editar_empresa');

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});