<?php

namespace Modules\Users\App\Repositories;

use Illuminate\Http\Request;

use Modules\Users\App\Models\Users;
use Modules\Users\App\Repositories\UserRepositoryInterface;

/** Clase para gestionar el repositorio del módulo Users(Usuarios) **/
class UserRepository implements UserRepositoryInterface 
{

    /** Permite obtener todos los usuarios registrados en la BD **/
    public function all(Request $request)
    { 
       $page = $request->query('pageNumber', 1);
       $perPage = $request->query('pageElements', 100);
       return Users::paginate($perPage, ['*'], 'page', $page);
    }

    /** Permite obtener la información de un usuario especifico **/
    public function where(string $field, string $value)
    {
        return Users::where($field,$value)->first();
    }

    /** Permite obtener la información de un usuario especifico **/
    public function find($id)
    {
        return Users::find($id);
    }

    /** Permite registrar y guardar un nuevo usuario en la BD **/
    public function create($data)
    {
        return Users::create($data);
    }
}