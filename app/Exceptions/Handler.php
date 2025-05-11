<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (Throwable $e, $request)
        {
            /** Se verifica que este un token en la petición **/
            if (!$request->bearerToken()) 
            {
                return response()->json([
                    'status' => Response::HTTP_UNAUTHORIZED,
                    'error' => 'Acceso denegado, el token no se ha proporcionado o es inválido.'
                ], Response::HTTP_UNAUTHORIZED);
            }

            /** Se valida si el usuario esta autenticado **/
            if(!auth()->check())
            {
                return response()->json([
                    'status' => Response::HTTP_UNAUTHORIZED,
                    'error' => 'Acceso no autorizado. Por favor inicie sesión con su cuenta para continuar.'
                ], Response::HTTP_UNAUTHORIZED);
            }

            if ($request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error interno del servidor'
                ], 500);
            }
        });
    }
}
