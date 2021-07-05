<?php

namespace App\Services;

use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class CategoryService
{
    protected $defaultResponse;
    protected $url;
    protected $http;

    public function __construct(DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url = config('microservices.available.micro_01.url') . '/categories';
        $this->http = Http::acceptJson();
    }

    public function getAllCategories(array $params = [])
    {
        $response = $this->http->get($this->url, $params);
    
        return $this->defaultResponse->response($response);
    }

    public function newCategory(array $params = [])
    {
        $response = $this->http->post($this->url, $params);
    
        return $this->defaultResponse->response($response);
    }

    public function getCategoryById($id)
    {
        $response = $this->http->get($this->url . '/' . $id);
    
        return response()->json(json_decode($response->body()), $response->status());
    }

    public function deleteCategory($id)
    {
        $response = $this->http->delete($this->url . '/' . $id);
    
        return response()->json(json_decode($response->body()), $response->status());
    }

    public function updateCategory(string $id, array $params = [])
    {
        $response = $this->http->put($this->url . '/' . $id, $params);
    
        return response()->json(json_decode($response->body()), $response->status());
    }
}
