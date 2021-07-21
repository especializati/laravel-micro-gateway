<?php

namespace App\Services;

use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class RegisterService
{
    protected $defaultResponse;
    protected $url;
    protected $http;

    public function __construct(DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url = config('microservices.available.micro_auth.url') . '/register';
        $this->http = Http::acceptJson();
    }

    public function register(array $params = [])
    {
        $response = $this->http->post($this->url, $params);
    
        return $this->defaultResponse->response($response);
    }
}
