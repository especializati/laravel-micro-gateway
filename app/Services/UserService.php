<?php

namespace App\Services;

use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class UserService
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

    public function addNewPermissionForUser(array $params = [])
    {
        $response = $this->http
                            ->withHeaders([
                                'Authorization' => request()->header('Authorization')
                            ])
                            ->post($this->url . '/users/permissions', $params);

        return response()->json(json_decode($response->body()), $response->status());
    }
}
