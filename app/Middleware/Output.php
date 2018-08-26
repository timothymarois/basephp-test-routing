<?php namespace App\Middleware;

class Output
{

    public function handle($request, $next)
    {
        return $next($request);
    }

}
