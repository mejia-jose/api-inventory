<?php

namespace Modules\Categories\App\Services;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Modules\Categories\App\Repositories\CategorieRepositoryInterface;

class CategoriesServices
{
   protected $categoryRepository;

   /** Se inyecta el repositorio de categorias */
   public function __construct(CategorieRepositoryInterface $categoryRepository)
   {
     $this->categoryRepository = $categoryRepository;
   }

    /** Permite mapear la respuesta que se debe devolver al usuario */
    private function mapGetAllToResponse($categories)
    {
        return [
            'data' => $categories->items(),
            'total' => $categories->total(),
            'per_page' => $categories->perPage(),
            'current_page' => $categories->currentPage(),
            'lastPage' => $categories->lastPage(),
        ];
    }

    /** Obtiene todas las categorías regsitradas en BD **/
    public function getAllCategoríes(Request $request)
    {
        try
        {
            $categories = $this->categoryRepository->all($request);

            /** Si no se encuentran categorías **/
            if(!$categories )
            {
                return response()->json(
                [
                'status' => Response::HTTP_NOT_FOUND,
                'errors' => 'No hay categorías registradas en la base de datos.'
                ], Response::HTTP_NOT_FOUND);
            }

            $response = response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Listado de categorías.',
                'records' => $this->mapGetAllToResponse($categories)
            ], Response::HTTP_OK);

            return $response;
        }catch(\Exception $e)
        {
            return response()->json(['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'errors' => 'Error: ' . $e->getMessage()]);
        }
    }

    /** Obtiene la información de una categoría regsitrada en BD por medio del ID **/
    public function categoryById(string $categoryId)
    {
        try
        {
            $category= $this->categoryRepository->find($categoryId);

            /** Si no se encuentran la categoría **/
            if(!$category)
            {
                return response()->json(
                [
                   'status' => Response::HTTP_NOT_FOUND,
                   'errors' => 'No se encontró ninguna categoría registrada con el ID ' . $categoryId . '.'
                ]);
            }

            return $category ;
        }catch(\Exception $e)
        {
            return response()->json(['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'errors' => 'Error: ' . $e->getMessage()]);
        }
    }

   /** Permite validar la información recibida **/
   private function validateData(Request $request)
   {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);

        return $validator;
   }

   /** Permite procesar y validar la información para registrar la categoría **/
    public function registerCategory(Request $request)
    {
        try 
        {
            $validator = $this->validateData($request);
            if ($validator->fails())
            {
                return response()->json([
                    'status' => Response::HTTP_BAD_REQUEST,
                    'errors' => $validator->errors()
                ],Response::HTTP_BAD_REQUEST);
            }

            $categoryExist = $this->categoryRepository->exist('name',$request->name);
            if($categoryExist)
            {
                return response()->json([
                    'status' => Response::HTTP_CONFLICT,
                    'errors' => 'Error: ' . 'Ya existe una categoría con ese nombre.'
                ]);
            }

            $category = ['name' => $request->name, 'description' => $request->description];

            $categoryCreate = $this->categoryRepository->create($category);
            if (!$categoryCreate) 
            {
                throw new Exception('Ha ocurrido un error al crear la categoría. Por favor, inténtelo más tarde.');
            }

            $response = response()->json([
                'status' => Response::HTTP_CREATED,
                'result' =>['message' => 'Categoría registrada exitosamente.', 'category' => $categoryCreate]
            ],Response::HTTP_CREATED);
           
            return $response;

        } catch (\Exception $e)
        {
            return response()->json([
              'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
              'errors' => 'Error: ' . $e->getMessage()
            ]);
        }
   }

    /** Elimina la información de una categoría regsitrada en BD por medio del ID **/
    public function deleteCategory(string $categoryId)
    {
        try
        {
            $category= $this->categoryRepository->delete($categoryId);

            /** Si no se encuentran la categoría **/
            if(!$category)
            {
                return response()->json(
                [
                   'status' => Response::HTTP_NOT_FOUND,
                   'errors' => 'No se encontró ninguna categoría registrada con el ID ' . $categoryId . '.'
                ]);
            }

            return response()->json([
                'status' => Response::HTTP_NO_CONTENT,
                'message' => 'La categoría se eliminó correctamente.'
            ]);
        }catch(\Exception $e)
        {
            return response()->json(['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'errors' => 'Error: ' . $e->getMessage()]);
        }
    }

    /** Elimina la información de una categoría regsitrada en BD por medio del ID **/
    public function updateCategory(string $categoryId, Request $request)
    {
        try
        {
            $data = $request->only(['name','description']);
            $category = $this->categoryRepository->update($categoryId,$data);

            /** Si no se encuentran la categoría **/
            if(!$category)
            {
                return response()->json(
                [
                   'status' => Response::HTTP_NOT_FOUND,
                   'errors' => 'No se encontró ninguna categoría registrada con el ID ' . $categoryId . '.'
                ]);
            }

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'La categoría se actualizó correctamente.',
                'category' => $category
            ]);
        }catch(\Exception $e)
        {
            return response()->json(['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'errors' => 'Error: ' . $e->getMessage()]);
        }
    }
}