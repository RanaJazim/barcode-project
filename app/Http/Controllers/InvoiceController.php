<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Inventory;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function open()
    {
        $data = (object)['id' => 1];
        $inventories = Inventory::all();
        $customers = Customer::all();

        return view('panel.invoice.open', compact('data',
            'inventories', 'customers'));
    }

    public function create(Request $request)
    {
        $customer = Customer::findOrFail($request['customer_id']);
        $inventory = Inventory::findOrFail($request['inventory->id']);


    }

}
