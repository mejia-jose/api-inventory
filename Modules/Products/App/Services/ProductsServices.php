<?php

namespace Modules\Products\App\Services;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Modules\Products\App\Repositories\ProductsRepositoryInterface;

class ProductsServices
{
   protected $productRepository;

   /** Se inyecta el repositorio de productos */
   public function __construct(ProductsRepositoryInterface $productRepository)
   {
     $this->productRepository = $productRepository;
   }

    /** Obtiene todos los productos registradas en BD **/
    public function getAllProduct()
    {
        try
        {
            $products = $this->productRepository->all();

            /** Si no se encuentran productos **/
            if(!$products)
            {
                return response()->json(
                [
                    'status' => Response::HTTP_NOT_FOUND,
                    'errors' => 'No hay productos registrados en la base de datos.'
                ], Response::HTTP_NOT_FOUND);
            }

            $response = response()->json(
            [
                'status' => Response::HTTP_OK,
                'message' => 'Listado de productos.',
                'records' => $products

            ], Response::HTTP_OK);

            return $response;
        }catch(\Exception $e)
        {
            return response()->json(['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'errors' => 'Error: ' . $e->getMessage()]);
        }
    }

    /** Obtiene todos los productos pertenecientes registradas en BD **/
    public function getProductByCategory($categoryId)
    {
        try
        {
            $validator = $this->validateUUID('categoryId',$categoryId);
            if($validator->fails())
            {
                return $this->returnErrorData($validator->errors());
            }
            
            $products = $this->productRepository->where('category_id',$categoryId);

            /** Si no se encuentran productos **/
            if(!$products)
            {
                return response()->json(
                [
                    'status' => Response::HTTP_NOT_FOUND,
                    'errors' => 'No se encontrarón productos asociados a la categoría en la base de datos.'
                ], Response::HTTP_NOT_FOUND);
            }

            $response = response()->json(
            [
                'status' => Response::HTTP_OK,
                'message' => 'Listado de productos.',
                'records' => $products
            ], Response::HTTP_OK);

            return $response;
        }catch(\Exception $e)
        {
            return response()->json(['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'errors' => 'Error: ' . $e->getMessage()]);
        }
    }

    /** Obtiene la información de un producto regsitrado en BD por medio del ID **/
    public function productById(string $productId)
    {
        try
        {
            $product = $this->productRepository->find($productId);

            /** Si no se encuentra el producto **/
            if(!$product)
            {
                return response()->json(
                [
                   'status' => Response::HTTP_NOT_FOUND,
                   'errors' => 'No se encontró ningún producto registrado con el ID ' . $productId . '.'
                ]);
            }

            return $product;
        }catch(\Exception $e)
        {
            return response()->json(['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'errors' => 'Error: ' . $e->getMessage()]);
        }
    }

   /** Permite validar la información recibida **/
   private function validateData(Request $request, string $type)
   {
        $validator = Validator::make($request->all(), [
            'name' => $type.'|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => $type.'|numeric|min:0',
            'stock' => $type.'|integer|min:0',
            'categoryId' => $type.'|uuid|exists:categories,id',
        ]);

        return $validator;
   }

   /** Permite validar los UUID */
   private function validateUUID(string $field, string $value)
   {
        return Validator::make(
            [$field => $value],
            [$field => 'required|uuid|exists:categories,id']
        );
   }

   private function returnErrorData($error)
   {
        return response()->json([
            'status' => Response::HTTP_BAD_REQUEST,
            'errors' => $error
        ],Response::HTTP_BAD_REQUEST);
   }

   /** Permite procesar y validar la información para registrar la producto **/
    public function registerProduct(Request $request)
    {
        try 
        {
            $validator = $this->validateData($request,'required');
            if ($validator->fails())
            {
                return $this->returnErrorData($validator->errors());
            }

            $productExist = $this->productRepository->exist('name',$request->name);
            if($productExist)
            {
                return response()->json([
                    'status' => Response::HTTP_CONFLICT,
                    'errors' => 'Error: ' . 'Ya existe una producto con ese nombre.'
                ]);
            }

            $newProduct = [
                'name' => $request->name, 
                'description' => $request->description, 
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->categoryId
            ];

            $productCreate = $this->productRepository->create($newProduct);
            if (!$productCreate) 
            {
                throw new Exception('Ha ocurrido un error al crear el producto. Por favor, inténtelo más tarde.');
            }

            $response = response()->json([
                'status' => Response::HTTP_CREATED,
                'result' =>['message' => 'Producto registrado exitosamente.', 'product' => $productCreate]
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

    /** Elimina la información de un producto regsitrado en BD por medio del ID **/
    public function deleteProduct(string $productId)
    {
        try
        {
            $product = $this->productRepository->delete($productId);

            /** Si no se encuentran la producto **/
            if(!$product)
            {
                return response()->json(
                [
                   'status' => Response::HTTP_NOT_FOUND,
                   'errors' => 'No se encontró ningún producto registrado con el ID ' . $productId . '.'
                ]);
            }

            return response()->json([
                'status' => Response::HTTP_NO_CONTENT,
                'message' => 'El producto se eliminó correctamente.'
            ]);
        }catch(\Exception $e)
        {
            return response()->json(['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'errors' => 'Error: ' . $e->getMessage()]);
        }
    }

    /** Elimina la información de un producto regsitrado en BD por medio del ID **/
    public function updateProduct(string $productId, Request $request)
    {
        try
        {
            $validator = $this->validateData($request,'nullable');
            if ($validator->fails())
            {
                return $this->returnErrorData($validator->errors());
            }

            $data = $request->only(['name','description','price','stock','category_id']);
            $product = $this->productRepository->update($productId,$data);

            /** Si no se encuentran el producto **/
            if(!$product)
            {
                return response()->json(
                [
                   'status' => Response::HTTP_NOT_FOUND,
                   'errors' => 'No se encontró ningún producto registrado con el ID ' . $productId . '.'
                ]);
            }

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'El producto se actualizó correctamente.',
                'product' => $product
            ]);
        }catch(\Exception $e)
        {
            return response()->json(['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'errors' => 'Error: ' . $e->getMessage()]);
        }
    }
}