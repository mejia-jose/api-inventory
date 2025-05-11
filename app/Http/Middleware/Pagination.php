<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/** Este clase permite crear el middleware para los acciones de acuerdo al rol **/
class Pagination
{
    
    public function handle(Request $request, Closure $next): Response
    {
        $page = $request->query('pageNumber', 1);
        $perPage = $request->query('pageElements', 10);

        if (!is_numeric($page) || !is_numeric($perPage)) 
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Los parámetros de paginación son inválidos. Asegúrese de enviar valores numéricos válidos.'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if($page < 1 || $perPage < 1)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Los parámetros de paginación son inválidos. Asegúrese de enviar valores numéricos mayores a 1.'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $next($request);
    }
}
