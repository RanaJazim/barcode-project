<?php

namespace App\Custom\Repository\Customer;

use App\Custom\Repository\GeneralRepository;
use App\Custom\Validation\CustomerValidation;
use App\Customer;


class CustomerRepository extends GeneralRepository
{

    public function store(object $obj)
    {
        // TODO: Implement store() method.
        $validation = new CustomerValidation();
        $attributes = $validation->validation($obj);

        return Customer::create($attributes);
    }

    public function update(object $obj, $params)
    {
        // TODO: Implement update() method.
        $validation = $this->get_validation_obj();
        $attributes = $validation->validation($obj);

        return Customer::findOrFail($params)->update($attributes);
    }

    public function getAllRecord()
    {
        // TODO: Implement getAllRecord() method.
        return Customer::all();
    }

    public function edit($params)
    {
        // TODO: Implement edit() method.
        return Customer::findOrFail($params);
    }

    public function destory($params)
    {
        // TODO: Implement destory() method.
        return Customer::findOrFail($params)->delete();
    }

    private function get_validation_obj()
    {
        return new CustomerValidation();
    }
}



