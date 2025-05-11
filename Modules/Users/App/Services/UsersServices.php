<?php

namespace Modules\Users\App\Services;

use Illuminate\Http\Response;
use Modules\Users\App\Models\Users;
use Modules\Users\App\Repositories\UserRepositoryInterface;

class UsersServices
{
   protected $userRepository;

   /** Se inyecta el repositorio de usuarios, para acceder a la información de usuarios **/
   public function __construct(UserRepositoryInterface $userRepository)
   {
      $this->userRepository = $userRepository;
   }

   /** Permite hacer usa del repositorio, para obtener todos los usuarios en BD **/
   public function getAllUsers()
   {
     try
     {
        $users = $this->userRepository->all();

        /** Si no se encuentran usuarios **/
        if(!$users)
        {
            return response()->json(
            [
                'error' => 'No hay usuarios registrados en la base de datos.'
            ], Response::HTTP_NOT_FOUND);
        }

        return $users;
     }catch(\Exception $e)
     {
        return response()->json([ 'error' => 'Error: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
     }
   }

   public function createUser($data)
   {
    
   }
}