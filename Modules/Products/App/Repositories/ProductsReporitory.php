<?php
namespace Modules\Products\App\Repositories;

use Modules\Products\App\Models\Products;
use Modules\Products\App\Repositories\ProductsRepositoryInterface;

/** Clase para gestionar el repositorio del módulo Products(Productos) **/
class ProductsReporitory implements ProductsRepositoryInterface
{
    /** Permite obtener el listado de productos registrados en BD **/
    public function all()
    {
       return Products::all();
    }

    /** Permite validar si una prodcuto existe **/
    public function exist(string $field, $value)
    {
        return Products::where($field, $value)->exists();
    }

    /** Permite obtener los productos de acuerdo a la condición **/
    public function where(string $field, $value)
    {
        return Products::where($field, $value)->get();
    }

    /** Permite obtener la información de una prodcuto por medio del ID **/
    public function find(string $id)
    {
        return Products::find($id);
    }

    /** Permite registrar un prodcuto en la BD **/
    public function create(array $data)
    {
        return Products::create($data);
    }

    /** Permite actualizar la información de un producto en la BD **/
    public function update(string $id, array $data)
    {
        $category = $this->find($id);
        if(!$category)
        {
            return false;
        }
        $update = $category->update($data);
        return !$update ? false : $category;
    }

     /** Permite eliminar una prodcuto de la BD **/
    public function delete(string $id)
    {
        $category = $this->find($id);
        if(!$category)
        {
            return false;
        }
        return $category->delete();
    }
}