<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnsureUserHasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $response = Http::acceptJson()
                            ->withHeaders([
                                'Authorization' => $request->header('Authorization')
                            ])
                            ->get(config('microservices.available.micro_auth.url') . "/users/can/{$permission}");
        
        if ($response->status() == 200) {
            return $next($request);
        }

        return response()->json(json_decode($response), $response->status());
    }
}
