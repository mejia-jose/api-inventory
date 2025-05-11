<?php

namespace Modules\Auth\App\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
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
