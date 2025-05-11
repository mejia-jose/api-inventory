<?php

namespace Modules\Products\App\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Products\App\Services\ProductsServices;

class ProductsController extends Controller
{
    protected $productServices;

    /** Se inyecta el servicio de productos **/
    public function __construct(ProductsServices $productServices)
    {
        $this->productServices = $productServices;
    }    

    /** Obtiene la información de los productos y las devuelve al usuario **/
    public function all(Request $request)
    {
        return $this->productServices->getAllProduct($request);
    }

    /** Obtiene la información de un producto por medio del ID y lo devuelve al usuario **/
    public function productById(string $productId)
    {
        return $this->productServices->productById($productId);
    }

    /** Obtiene la información de los productos pertenencientes a una categoría **/
    public function getProductByCategoryId(string $categoryId)
    {
        return $this->productServices->getProductByCategory($categoryId);
    }

    /** Recibe la información y los envía al servicio para para crear el prodcuto **/
    public function create(Request $request)
    {
        return  $this->productServices->registerProduct($request);
    }

    /** Obtiene el ID del producto envia al servicio para eliminar y se retorna al usuario **/
    public function delete(string $productId)
    {
        return $this->productServices->deleteProduct($productId);
    }

    /** Obtiene la información del producto a atualizar y retorna **/
    public function update(string $productId, Request $request)
    {
        return $this->productServices->updateProduct($productId,$request);
    }
}
