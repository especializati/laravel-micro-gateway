<?php

namespace App\Services;

use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class EvaluationService
{
    protected $defaultResponse;
    protected $url;
    protected $http;

    public function __construct(DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url = config('microservices.available.micro_02.url') . '/evaluations';
        $this->http = Http::acceptJson();
    }

    public function createNewEvaluationByCompany(string $identify, array $params = [])
    {
        $response = $this->http->post($this->url . '/' . $identify, $params);

        return response()->json(json_decode($response->body()), $response->status());
    }
}
