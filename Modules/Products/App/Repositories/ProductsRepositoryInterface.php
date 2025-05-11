<?php

namespace Modules\Products\App\Repositories;
use Illuminate\Http\Request;

/** Se define la interfaz para el repositorio del modelo de productos(Products) **/
interface ProductsRepositoryInterface
{
    public function all(Request $request);
    public function find(string $id);
    public function exist(string $fiel, $value);
    public function where(string $field, $value);
    public function create(array $data);
    public function update(string $id, array $data);
    public function delete(string $id);
}