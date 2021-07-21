<?php

namespace App\Services;

use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class ResourceService
{
    protected $defaultResponse;
    protected $url;
    protected $http;

    public function __construct(DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url = config('microservices.available.micro_auth.url');
        $this->http = Http::acceptJson();
    }

    public function getResources()
    {
        $response = $this->http
                            ->withHeaders([
                                'Authorization' => request()->header('Authorization')
                            ])
                            ->get($this->url . '/resources');

        return $this->defaultResponse->response($response);
    }
}
