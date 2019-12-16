<?php

namespace App\Custom\Repository\Invoice;

interface InvoiceInterface
{
    public function getAllRecord($param1, $param2);
    public function open();
    public function create(object $obj);
}




