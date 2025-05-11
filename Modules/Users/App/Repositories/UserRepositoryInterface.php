<?php

namespace Modules\Users\App\Repositories;
use Illuminate\Http\Request;
/** Se define la interface para el repositorio del modulo usuario */
interface UserRepositoryInterface
{
  public function all(Request $request);
  public function find($id);
  public function where(string $field, string $value);
  public function create(array $data);
}