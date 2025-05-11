<?php
namespace Modules\Categories\App\Repositories;

use Modules\Catogories\App\Models\Catogories;
use Modules\Categories\App\Repositories\CategorieRepositoryInterface;

/** Clase para gestionar el repositorio del módulo Categoríes(Categorías) **/
class CategoriesReporitory implements CategorieRepositoryInterface
{
    /** Permite obtener el lsitado de categorías regsitrados en BD **/
    public function all()
    {
       return Catogories::all();
    }

    /** Permite obtener la información de una categoría por medio del ID **/
    public function find(string $id)
    {
        return Catogories::find($id);
    }

    /** Permite registrar una categoría en la BD **/
    public function create(array $data)
    {
        return Catogories::create($data);
    }

    /** Permite actualizar la información de una categoría **/
    public function update(string $id, array $data)
    {
        $category = $this->find($id);
        return $category->update($data);
    }

     /** Permite eliminar una categoría de la BD **/
    public function delete(string $id)
    {
        $category = $this->find($id);
        return $category->delete();
    }
}