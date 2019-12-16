<?php

namespace App\Custom\Repository\Inventory;

use App\Custom\Repository\GeneralRepository;
use App\Custom\Validation\InventoryValidation;
use App\Inventory;

class InventoryRepository extends GeneralRepository
{

    public function store(object $obj)
    {
        // TODO: Implement store() method.
        $validation = new InventoryValidation();
        $attributes = $validation->validation($obj);

        return Inventory::create($attributes);
    }

    public function update(object $obj, $params)
    {
        // TODO: Implement update() method.
        $validation = new InventoryValidation();
        $attributes = $validation->validation($obj);

        return Inventory::findOrFail($params)->update($attributes);
    }

    public function getAllRecord()
    {
        // TODO: Implement getAllRecord() method.
        return Inventory::all();
    }

    public function edit($params)
    {
        // TODO: Implement edit() method.
        return Inventory::findOrFail($params);
    }

    public function destory($params)
    {
        // TODO: Implement destory() method.
        return Inventory::findOrFail($params)->delete();
    }

}




