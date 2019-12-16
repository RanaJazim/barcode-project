<?php

namespace App\Custom\Repository\Invoice;

use App\Custom\Repository\GeneralInvoiceRepository;
use App\Custom\Validation\InvoiceValidation;
use App\Customer;
use App\Inventory;
use App\Invoice;

class InvoiceRepository extends GeneralInvoiceRepository implements InvoiceInterface
{

    public function getAllRecord($param1, $param2)
    {
        // TODO: Implement getAllRecord() method.

        return Invoice::where('customer_id', $param1)
            ->where('inventory_id', $param2)
            ->get();
    }

    public function open()
    {
        // TODO: Implement open() method.

        return [
            'data' => (object)['id' => 1],
            'inventories' => Inventory::all(),
            'customers' => Customer::all()
        ];
    }

    public function create(object $obj)
    {
        // TODO: Implement create() method.

        return [
            'customer' => Customer::findOrFail($obj['customer_id']),
            'inventory' => Inventory::findOrFail($obj['inventory_id'])
        ];
    }

    public function destory($params)
    {
        // TODO: Implement destory() method.

        return Invoice::findOrFail($params)->delete();
    }

    public function show($params)
    {
        // TODO: Implement show() method.

        return Invoice::findOrFail($params);
    }

    public function store(object $obj)
    {
        // TODO: Implement store() method.

        $attributes = $this->get_validation_obj($obj);

        $attributes['finalPrice'] = $this->getFinalPrice($obj);
        $attributes['onDate'] = date('Y-m-d');

        return Invoice::create($attributes);
    }

    public function update(object $obj, $params)
    {
        // TODO: Implement update() method.

        $attributes = $this->get_validation_obj($obj);
        $attributes['finalPrice'] = $this->getFinalPrice($obj);
        $attributes['onDate'] = $obj['onDate'];

        $invoice = Invoice::findOrFail($params);
        $invoice->update($attributes);

        return $invoice;
    }

    private function get_validation_obj($obj)
    {
        $validation =  new InvoiceValidation();

        return $validation->validation($obj);
    }

    private function getFinalPrice($values)
    {
        $value = $values['unitPrice'] - $values['discount'];
        $local_gst = ( $value * $values['gst'] ) / 100;

        return $value + $local_gst;
    }


}










