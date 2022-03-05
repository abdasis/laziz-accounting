<?php

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository implements CustomerRepositoryInterface
{

    public function getAll()
    {
        return Supplier::all();

    }

    public function getById($id)
    {
        return Supplier::find($id);
    }

    public function create($requestData)
    {
        return Supplier::create($requestData);
    }

    public function update($id, $requestData)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($requestData);

        return $supplier;
    }

    public function delete($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return $supplier;
    }

    public function trash()
    {
        return Supplier::onlyTrashed()->get();
    }

    public function restore($id)
    {
        $supplier = Supplier::withTrashed()->findOrFail($id);
        $supplier->restore();

        return $supplier;
    }
}
