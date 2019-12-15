<?php

namespace App\Http\Controllers;

use App\Custom\Notification\INotification;
use App\Customer;
use App\Inventory;
use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($customer_id, $inventory_id)
    {
        $invoices = Invoice::where('customer_id', $customer_id)
            ->where('inventory_id', $inventory_id)
            ->get();

        return view('panel.invoice.index', compact('invoices',
            'customer_id', 'inventory_id'));
    }

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
        $inventory = Inventory::findOrFail($request['inventory_id']);

        return view('panel.invoice.create', compact('customer',
            'inventory'));
    }

    public function store(Request $request, INotification $notification)
    {
        $attributes = $this->validation($request);
        $attributes['finalPrice'] = $this->getFinalPrice($request);
        $attributes['onDate'] = date('Y-m-d');

        Invoice::create($attributes);
        $notification->messageNotification('Successfully created the
        invoice', 'success');

        return redirect()->back();
    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('panel.invoice.print', compact('invoice'));
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('panel.invoice.edit', compact('invoice'));
    }

    public function update(Request $request, $id, INotification $notification)
    {
        $attributes = $this->validation($request);
        $attributes['finalPrice'] = $this->getFinalPrice($request);
        $attributes['onDate'] = $request['onDate'];

        $invoice = Invoice::findOrFail($id);

        $invoice->update($attributes);
        $notification->messageNotification('Successfully update the
            invoice', 'success');

        return redirect()->route('invoice.index', [
            'customerId' => $invoice->customer->id,
            'inventoryId' => $invoice->inventory->id
        ]);
    }

    public function destroy($id, INotification $notification)
    {
        Invoice::findOrFail($id)->delete();
        $notification->messageNotification('Successfully deleted the
            invoice', 'success');

        return redirect()->back();
    }

    private function validation($values)
    {
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

    private function getFinalPrice($values)
    {
        $value = $values['unitPrice'] - $values['discount'];
        $local_gst = ( $value * $values['gst'] ) / 100;

        return $value + $local_gst;
    }

}
