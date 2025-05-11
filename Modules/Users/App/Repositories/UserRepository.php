<?php

namespace Modules\Users\App\Repositories;

use Modules\Users\App\Models\Users;
use Modules\Users\App\Repositories\UserRepositoryInterface;

/** Clase para gestionar el repositorio del módulo Users(Usuarios) **/
class UserRepository implements UserRepositoryInterface 
{

    /** Permite obtener todos los usuarios registrados en la BD **/
    public function all()
    {
       return Users::all();
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

    /** Permite actualizar la información de un usuario en la BD **/
    public function update($id, $data)
    {
        $user = $this->find($id);
        return $user->update($data);
    }

    /** Permite eliminar la información de un usuario en la BD **/
    public function delete($id)
    {
        $user = $this->find($id);
        return $user->delete();
    }

    /** Permite consultar un usuario por medio del email **/
    public function getUserByEmail(string $email)
    {
        return Users::where('email',$email)->first();
    }
}