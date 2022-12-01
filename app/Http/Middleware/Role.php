<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{

    public function handle($request, Closure $next)
    {
        if (!Auth::check()) 
            return redirect('login');

        $user = Auth::user();

        if($user->role == 2)
            return $next($request);

        return redirect('login');
    }
}
