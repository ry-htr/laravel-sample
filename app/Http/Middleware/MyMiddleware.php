<?php

namespace App\Http\Middleware;

use Closure;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

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
        $log = new Logger('mylogger');
        $log->pushHandler(new StreamHandler('../storage/logs/request.log', Logger::INFO))
            ->addInfo('request', $request->toArray());
        $log->addInfo('user', ['hoge' => 'huga']);

        return $next($request);
    }
}
