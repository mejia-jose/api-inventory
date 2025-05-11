<?php
namespace Modules\Categories\App\Repositories;

use Modules\Categories\App\Models\Categories;
use Modules\Categories\App\Repositories\CategorieRepositoryInterface;

/** Clase para gestionar el repositorio del módulo Categoríes(Categorías) **/
class CategoriesReporitory implements CategorieRepositoryInterface
{
    /** Permite obtener el lsitado de categorías regsitrados en BD **/
    public function all()
    {
       return Categories::all();
    }

    /** Permite validar si una categoría existe **/
    public function exist(string $field, $value)
    {
        return Categories::where($field, $value)->exists();
    }

    /** Permite obtener la información de una categoría por medio del ID **/
    public function find(string $id)
    {
        return Categories::find($id);
    }

    /** Permite registrar una categoría en la BD **/
    public function create(array $data)
    {
        return Categories::create($data);
    }

    /** Permite actualizar la información de una categoría **/
    public function update(string $id, array $data)
    {
        $category = $this->find($id);
        if(!$category)
        {
            return false;
        }
        return $category->update($data);
    }

     /** Permite eliminar una categoría de la BD **/
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