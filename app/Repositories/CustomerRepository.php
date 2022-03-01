<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function getAll()
    {
        return Customer::all();
    }

    public function getById($id)
    {
        return Customer::find($id);
    }

    public function create($requestData)
    {
        return Customer::create($requestData);
    }

    public function update($id, $requestData)
    {
        $customer = Customer::find($id);
        $customer->update($requestData);
        return $customer;
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return $customer;
    }

    public function trash()
    {
        return Customer::onlyTrashed()->get();
    }

    public function restore($id)
    {
        $customer = Customer::withTrashed()->find($id);
        $customer->restore();
        return $customer;
    }

}
