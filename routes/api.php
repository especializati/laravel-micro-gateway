<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CompanyController
};

Route::get('/companies', [CompanyController::class, 'index']);

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});