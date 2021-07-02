<?php

namespace App\Services;

use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class CompanyService
{
    protected $defaultResponse;
    protected $url;
    protected $http;

    public function __construct(DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url = config('microservices.available.micro_01.url');
        $this->http = Http::acceptJson();
    }

    public function getAllCompanies(array $params = [])
    {
        $response = $this->http->get($this->url . '/companies', $params);
    
        return $this->defaultResponse->response($response);
    }

    public function newCompany(array $params = [])
    {
        $response = $this->http->post($this->url . '/companies', $params);
    
        return $this->defaultResponse->response($response);
    }
}
