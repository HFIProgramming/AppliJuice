<?php

namespace App\Http\Middleware;

use Closure;

class ApplicantExists
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
        if(empty($request->user()->applicant))
        {
            return redirect()->route('newApplicationForm');
        }
        return $next($request);
    }
}
