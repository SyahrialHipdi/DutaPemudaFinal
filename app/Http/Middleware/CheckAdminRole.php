<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    // public function handle(Request $request, Closure $next, ...$roles): Response
    // {
    //     $user = $request->user('admin');
        
    //     if (!$user || !in_array($user->role, $roles)) {
    //         abort(403, 'Unauthorized');
    //     }

    //     return $next($request);
    // }

    public function handle($request, Closure $next, ...$roles)
    {
        // $user = auth()->user();
        $user = Auth::user();

        if (!$user || !in_array($user->role, $roles)) {
            // abort(403, 'Akses ditolak.');
            return back();
        }

        return $next($request);
    }

}

