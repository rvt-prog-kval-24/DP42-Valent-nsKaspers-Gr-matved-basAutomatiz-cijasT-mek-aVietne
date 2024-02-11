<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class APIAuthorizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiCode = trim($request->header('X-API-Code'));

        if ($apiCode === '' || Company::where('api_code', $apiCode)->count() === 0) {
            return response(status: 401)->json([
                'message' => __('Wrong or empty X-API-Code has been provided.')
            ]);
        }

        return $next($request);
    }
}
