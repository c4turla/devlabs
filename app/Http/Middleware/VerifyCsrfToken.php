<?php

namespace App\Http\Middleware;

use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected function handleException($request, $next)
    {
        try {
            return $next($request);
        } catch (TokenMismatchException $exception) {
            // Redirect ke halaman login
            return redirect()->route('auth.login');
        }
    }

    
}
