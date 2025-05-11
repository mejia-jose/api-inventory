<?php

namespace Modules\Users\App\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Users\App\Services\UsersServices;

/** Se define el controlador que expone los endpoints del módulo de usuarios **/
class UsersController extends Controller
{
    protected $userService;

    /** Se inyecta el servico de usuarios **/
    public function __construct(UsersServices $userService)
    {
        $this->userService = $userService;
    }    

    /** Permite exponer el endpoint que obtiene el listado de los usuarios regsitrados en BD **/
    public function all(Request $request)
    {
       return $this->userService->getAllUsers($request);
    }

    /** Permite exponer el endpoint que registra usuarios en la BD **/
    public function register(Request $request)
    {
      return $this->userService->registerUser($request);
    }
}
