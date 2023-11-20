<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutoLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() && $cookie = $request->cookie('user_login_data')) {
            $userLoginData = json_decode($cookie, true);

            // Customize as needed based on your user model and login logic
            $user = User::find($userLoginData['user_id']);

            if ($user) {
                Auth::login($user);
            }
        }
        
        return $next($request);
    }
}
