<?php

namespace Modules\Auth\App\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Auth\App\Services\AuthServices;

class AuthController extends Controller
{
    protected $authServices;

    public function __construct(AuthServices $authServices)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->authServices = $authServices;
    }
    
    /** Login para autenticarse en la API **/
    public function login(Request $request)
    {
       return $this->authServices->login($request);
    }

    /** Permite cerrar la sesión del usuario **/
    public function logout(Request $request)
    {
        return $this->authServices->logout($request);
    }

    /** Permite refrescar la sesión del usuario **/
    public function refreshToken()
    {
        return $this->authServices->refreshToken();
    }
}
