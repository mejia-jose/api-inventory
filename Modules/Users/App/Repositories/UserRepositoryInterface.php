<?php

namespace Modules\Users\App\Repositories;

/** Se define la interface para el repositorio del modulo usuario */
interface UserRepositoryInterface
{
  public function all();
  public function find($id);
  public function create(array $data);
  public function update($id, array $data);
  public function delete($id);
  public function getUserByEmail(string $email);
}