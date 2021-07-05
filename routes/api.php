<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CompanyController
};

Route::get('/companies', [CompanyController::class, 'index']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::get('/companies/{identify}', [CompanyController::class, 'show']);

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});