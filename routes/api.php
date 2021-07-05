<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CompanyController
};

Route::get('/companies', [CompanyController::class, 'index']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::get('/companies/{identify}', [CompanyController::class, 'show']);
Route::delete('/companies/{identify}', [CompanyController::class, 'destroy']);
Route::put('/companies/{identify}', [CompanyController::class, 'update']);

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});