<?php

use App\Http\Utils\DefaultResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/companies', function (DefaultResponse $defaultResponse, Request $request) {
    $response = Http::withHeaders([
        'Accept' => 'application/json'
    ])
    ->get(config('microservices.available.micro_01.url') . '/companies', $request->all());

    return $defaultResponse->response($response);
});

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});