<?php

namespace App\Http\Utils;

use Illuminate\Http\Client\Response;

class DefaultResponse
{
    public function response(Response $response)
    {
        $body = json_decode($response->body());

        if ($response->status() !== 200) {
            return response()->json($body, $response->status());
        }
        
        return [
            'data' => $this->data($body->data),
            'meta' => isset($body->meta) ? $this->meta($body->meta) : []
        ];
    }

    private function data(array $data)
    {
        return collect($data);
    }

    private function links(array $links)
    {
        foreach ($links as $key => $link) {
            if (isset($link->url) && $link->url != null)  {
                $links[$key]->url = $this->replacePath($link->url);
            }
        }

        return $links;
    }

    private function meta($meta)
    {
        $meta->links = $this->links($meta->links);
        $meta->path = $this->replacePath($meta->path);

        return $meta;
    }

    private function replacePath(string $path)
    {
        foreach (config('microservices.available') as $key => $micro) {
            $path = str_replace($micro['url'], config('app.url'), $path);
        }

        return $path;
    }
}
