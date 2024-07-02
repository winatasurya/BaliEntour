<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($user && $user->role !== $role) {
            if ($user->role === 'perusahaan') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'wisatawan') {
                return redirect()->route('welcome');
            } else {
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
