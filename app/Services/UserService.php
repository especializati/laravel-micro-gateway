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
        $this->http = Http::acceptJson()
                            ->withHeaders([
                                'Authorization' => request()->header('Authorization')
                            ]);
    }

    public function addNewPermissionForUser(array $params = [])
    {
        $response = $this->http
                            ->post($this->url . '/users/permissions', $params);

        return response()->json(json_decode($response->body()), $response->status());
    }

    public function removePermissionForUser(array $params = [])
    {
        $response = $this->http->delete($this->url . '/users/permissions', $params);

        return response()->json(json_decode($response->body()), $response->status());
    }
}
