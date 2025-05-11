<?php

namespace Modules\Categories\App\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Categories\App\Services\CategoriesServices;

class CategoriesController extends Controller
{
    protected $categoryServices;

    /** Se inyecta el servico de usuarios **/
    public function __construct(CategoriesServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }    

    /** Obtiene la información de las categorías y las devuelve al usuario **/
    public function all()
    {
        return $this->categoryServices->getAllCategoríes();
    }

    /** Obtiene la información de las categorías y las devuelve al usuario **/
    public function categoryById(string $categoryId)
    {
        return $this->categoryServices->categoryById($categoryId);
    }

    /** Recibe la información y los envía al servicio para para crear la categoría **/
    public function create(Request $request)
    {
        return  $this->categoryServices->registerCategory($request);
    }
}
