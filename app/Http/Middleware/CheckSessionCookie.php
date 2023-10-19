<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class CheckSessionCookie
{
    public function handle($request, Closure $next)
    {
        // Get the current value of the laravel_session cookie
        $currentCookieValue = Cookie::get('laravel_session');

        // Get the previously stored value from the session
        $previousCookieValue = session('laravel_session_cookie_value');

        // Check if the cookie value has changed or if it's cleared
        if ($currentCookieValue !== $previousCookieValue) {
            // Redirect to the login page
            // sleep(10);

            // return redirect('/login')->with('error', 'Your session has expired. Please log in again.');

        }

        // Store the current cookie value in the session
        session(['laravel_session_cookie_value' => $currentCookieValue]);

        return $next($request);
    }
}
