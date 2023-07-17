<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $lastLoginTime = Session::get('last_login_time');
            $timeoutMinutes = 1; // 5 jam x 60 menit

            if ($lastLoginTime && Carbon::now()->diffInMinutes($lastLoginTime) > $timeoutMinutes) {
                Auth::logout();
                Session::flush();
                // Session::destroy();
                Session::regenerateToken();
                return redirect('sesi')->withErrors('Waktu login Anda telah berakhir. Silakan login kembali.');
            }

            // Update waktu login terakhir pada Session
            Session::put('last_login_time', Carbon::now());
        }
        return $next($request);
    }
}
