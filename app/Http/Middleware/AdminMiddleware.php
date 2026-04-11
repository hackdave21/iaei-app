<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Accès refusé. Droits administrateur requis.'], 403);
        }

        // if logged in but not admin, send to profile or home
        if (Auth::check()) {
            return redirect()->route('home')->with('error', 'Accès interdit : vous n\'avez pas les droits administrateur.');
        }

        return redirect()->route('admin.login')->with('error', 'Veuillez vous connecter en tant qu\'administrateur.');
    }
}
