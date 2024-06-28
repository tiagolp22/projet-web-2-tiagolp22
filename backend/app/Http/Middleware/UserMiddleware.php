<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user && $user->tokenCan('role:user') && $user->currentAccessToken()->tokenable_type == 'App\Models\Utilisateur') {
            return $next($request);
        }

        return response()->json('Not Authorized', 401);
    }
}