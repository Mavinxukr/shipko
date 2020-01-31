<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Response;

class RoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $roleName
     * @return mixed
     */
    public function handle($request, Closure $next, string $roleName)
    {
        $user = $request->user();
        if(is_null($user) || $user->role->name !== $roleName){
            return new Response('Forbidden for you role', 403);
        }
        return $next($request);
    }
}
