<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/companies', function () {
    $response = Http::withHeaders([
        'Accept' => 'application/json'
    ])
    ->get(config('microservices.available.micro_01.url') . '/companies');

    return response()->json(json_decode($response->body()), $response->status());
});

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});