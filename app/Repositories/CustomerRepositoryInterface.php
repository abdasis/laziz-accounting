<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function create($requestData);

    public function update($id, $requestData);

    public function delete($id);

    public function trash();

    public function restore($id);
}
