<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogAfterResponse
{
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function terminate(Request $request, Response $response)
    {
        Log::info('Response sent', [
            'url' => $request->fullUrl(),
            'status' => $response->getStatusCode(),
        ]);
    }
}

