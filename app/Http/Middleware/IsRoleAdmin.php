<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/** Este clase permite crear el middleware para los acciones de acuerdo al rol **/
class IsRoleAdmin
{
    protected $isAdmin = 'admin';
    
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(!auth()->check() || !in_array(auth()->user()->role,$roles))
        {
            return response()->json([
                'status' => Response::HTTP_FORBIDDEN,
                'error' => 'Usted no tiene permisos para realizar esta acción.'
            ]);
        }
        return $next($request);
    }
}
