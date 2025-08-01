<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificaPermiso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$permission)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = $request->user();
        
       
       //echo $user->hasPermission($permission);
       // echo $permission;
        if (!$user->hasPermission($permission)) {
            
            return redirect()->route('home')->with('message', '¡Sin Permiso!');
        }

        return $next($request);
    }
}
