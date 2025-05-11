<?php

namespace Modules\Auth\App\Services;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use Modules\Users\App\Services\UsersServices;

class AuthServices
{
    protected $userServices;
    /** Se inyecta el servicio de usuarios **/
    public function __construct(UsersServices $userServices)
    {
        $this->userServices = $userServices;
    }

    /** Login para autenticarse en la API **/
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails())
        {
           return response()->json(['errors' => $validator->errors()], 422);
        }

        $existUser = $this->userServices->getUserByEmail($request->email);
        if(!$existUser)
        {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'error' => 'El usuario no se encuentra registrado en el sistema.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $credentials = $request->only('email', 'password');
  
        if (! $token = auth()->attempt($credentials))
        {
            return response()->json([
                'status' => Response::HTTP_UNAUTHORIZED,
                'error' => 'Credenciales inválidas: El usuario o la contraseña son incorrectos.'
            ], Response::HTTP_UNAUTHORIZED);
        }
  
        return $this->responseToken($token);
    }

    /** Permite cerrar la sesión del usuario **/
    public function logout(Request $request)
    {
        auth()->logout();
  
        return response()->json([
            'status' => Response::HTTP_ACCEPTED,
            'message' => 'La sesión se cerró correctamente.'
        ]);
    }

    /** Permite refrescar la sesión del usuario **/
    public function refreshToken()
    {
        return $this->responseToken(auth()->refresh());
    }


    protected function responseToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() . ' minutos'
        ]);
    }
}