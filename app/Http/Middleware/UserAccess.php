<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = auth()->user();

        if (in_array($user->role_id, $roles)) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Bạn không có quyền truy cập vào trang này.');
        // return response()->view('errors.check-permission');
    }
}
