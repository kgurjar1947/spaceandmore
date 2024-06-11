<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = auth()->user()->type;
                if($role == 'super_admin'){
                    return redirect()->route('admin.dashboard');
                   }elseif($role == 'admin'){
                    return redirect()->route('user.admin.dashboard');
                   }elseif($role == 'hr'){
                        return redirect()->route('hr-dashboard');
                   }elseif($role == 'employee'){
                    return redirect()->route('employee-dashboard');  
                   }
            }
        }

        return $next($request);
    }
}
