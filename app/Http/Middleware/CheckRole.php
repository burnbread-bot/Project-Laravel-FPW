<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // 1. Cek apakah user sudah login
        if (! $request->user()) {
            return redirect()->route('login');
        }

        // 2. Cek apakah role user ada di daftar $roles
        if (! in_array($request->user()->role, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}