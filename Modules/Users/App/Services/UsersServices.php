<?php

namespace Modules\Users\App\Services;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Modules\Users\App\Repositories\UserRepositoryInterface;

class UsersServices
{
   protected $userRepository;
   private  $roleDefault = 'user';

   /** Se inyecta el repositorio de usuarios, para acceder a la información de usuarios **/
   public function __construct(UserRepositoryInterface $userRepository)
   {
      $this->userRepository = $userRepository;
   }

   /** Permite obtener todos los usuarios en BD **/
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

   /** Permite validar la información recibida **/
   private function validateData(Request $request)
   {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'in:user,admin'
        ]);

        return $validator;
   }

   private function customResponse($type,$body,$code)
   {
      return [$type => $body, 'code' => $code];
   }

   /** Permite procesar y validar la información para registrar el usuario **/
   public function registerUser(Request $request)
   {
        try 
        {
            $validator = $this->validateData($request);
            if ($validator->fails())
            {
                return $this->customResponse('errors',$validator->errors(), Response::HTTP_BAD_REQUEST);
            }

            $role = auth()->user()->role;
            if(auth()->check() && $role === 'admin')
            {
               $this->roleDefault = $request->role ?? $this->roleDefault;
            }

            $user = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $this->roleDefault
            ];

            $userCreate = $this->userRepository->create($user);
            if (!$userCreate) 
            {
                throw new Exception('Ha ocurrido un error al crear el usuario. Por favor, inténtelo más tarde.');
            }

            $response =  $this->customResponse('result',[
                'message' => 'Usuario registrado exitosamente.', 
                'user' => $userCreate
            ], Response::HTTP_CREATED);

            return response()->json($response);

        } catch (\Exception $e)
        {
           return response()->json($this->customResponse('error','Error: ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR));
        }
   }
}