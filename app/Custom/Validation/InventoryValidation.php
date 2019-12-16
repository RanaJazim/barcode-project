<?php

namespace App\Custom\Validation;

use App\Custom\Validation\IValidation\CustomValidation;


class InventoryValidation implements CustomValidation
{
    public function validation($values)
    {
        // TODO: Implement validation() method.
        return $values->validate([
            'itemNumber' => 'required',
            'companyName' => 'required',
            'itemName' => 'required',
            'quantity' => 'required',
            'unitPrice' => 'required',
            'salePrice' => 'required',
            'localForeign' => 'required',
            'expiry' => 'required',
        ]);
    }
}


