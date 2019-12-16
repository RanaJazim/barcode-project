<?php

namespace App\Custom\Barcode;

class Qrcode
{
    private $companyName;
    private $itemNumber;
    private $address;

    public function __construct()
    {
        $this->companyName = 'Comapny Name';
        $this->itemNumber = 'Item Number';
        $this->address = 'Address';
    }

    public function setCompanyName($c_name)
    {
        $this->companyName = $c_name;
    }

    public function setItemNumber($item_number)
    {
        $this->itemNumber = $item_number;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function generate_qrCode($size)
    {
        return \SimpleSoftwareIO\QrCode\Facades\QrCode::size($size)
            ->generate(
                "Company Name: " . $this->companyName .
                "\r\nItem Number: " . $this->itemNumber .
                "\r\nAddress: " . $this->address
            );
    }

}





