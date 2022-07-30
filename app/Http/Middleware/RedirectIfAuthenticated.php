<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->id_role;

                switch ($role) {
                    case 1:
                        return redirect()->route('kemahasiswaan');
                        break;
                    case 2:
                        return redirect()->route('mahasiswa');
                        break;
                    case 3:
                        return redirect()->route('dokter');
                        break;
                    case 4:
                        return redirect()->route('psikolog');
                        break;
                    case 4:
                        return redirect()->route('pengurus_tekkes');
                        break;
                    default:
                        return redirect(RouteServiceProvider::HOME);
                        break;
                }
            }
        }

        return $next($request);
    }
}