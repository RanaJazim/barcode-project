<?php

namespace App\Custom\Validation;

use App\Custom\Validation\IValidation\CustomValidation;


class InvoiceValidation implements CustomValidation
{
    public function validation($values)
    {
        // TODO: Implement validation() method.

        return $values->validate([
            'inventory_id' => 'required',
            'customer_id' => 'required',
            'dueDate' => 'required',
            'incNumber' => 'required',
            'batchNumber' => 'required',
            'qty' => 'required',
            'unitPrice' => 'required',
            'discount' => 'required',
        ]);
    }
}


