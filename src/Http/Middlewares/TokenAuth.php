<?php

namespace Devertix\LaravelRemoteArtisan\Http\Middlewares;

use Closure;
use Illuminate\Http\Response;

class TokenAuth
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
        if (!trim(config('laravel-remote-artisan.auth-token'))) {
            abort(Response::HTTP_FORBIDDEN, 'missing token');
        }
        if ($request->header('Token') !== config('laravel-remote-artisan.auth-token')) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
