<?php

namespace App\Http\Middleware;

use Closure;

/**
 * リクエスト内容をログに残す
 * Class MyMiddleware
 * @package App\Http\Middleware
 */
class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Log::info('request', $request->toArray());

        return $next($request);
    }
}
