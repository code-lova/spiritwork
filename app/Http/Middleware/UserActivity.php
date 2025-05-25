<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $expiresAt = now()->addMinute(2); /*already give the time we set to 2*/
            Cache::put('User-is-Online'. Auth::user()->id, true, $expiresAt);

            /*User last seen*/
            User::where('id', Auth::user()->id)->update([
                'last_seen' => now(),
                'last_login' => now(),
                'ip_address' => request()->getClientIp()
            ]);
        }
        return $next($request);
    }
}
