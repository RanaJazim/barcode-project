<?php

namespace App\Custom\Validation;

class CustomerValidation implements CustomValidation
{

    public function validation($values)
    {
        // TODO: Implement validation() method.
        return $values->validate([
            'customerName' => 'required',
            'customerAddress' => 'required',
            'mobileNumber' => 'required',
        ]);
    }
}
