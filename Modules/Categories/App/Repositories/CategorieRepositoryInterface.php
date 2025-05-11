<?php

namespace Modules\Categories\App\Repositories;

use Illuminate\Http\Request;
/** Se define la interfaz para el repositorio del modelo de categorías(Categories) **/
interface CategorieRepositoryInterface
{
    public function all(Request $request);
    public function find(string $id);
    public function exist(string $fiel, $value);
    public function create(array $data);
    public function update(string $id, array $data);
    public function delete(string $id);
}