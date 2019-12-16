<?php

namespace App\Http\Controllers;

use App\Custom\Notification\INotification;
use App\Custom\Repository\Invoice\InvoiceRepository;
use App\Customer;
use App\Inventory;
use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($customer_id, $inventory_id, InvoiceRepository $repository)
    {
        $invoices = $repository->getAllRecord($customer_id, $inventory_id);

        return view('panel.invoice.index', compact('invoices',
            'customer_id', 'inventory_id'));
    }

    public function open(InvoiceRepository $repository)
    {
        $attribute = $repository->open();

        return view('panel.invoice.open', [
            'data' => $attribute['data'],
            'inventories' => $attribute['inventories'],
            'customers' => $attribute['customers'],
        ]);
    }

    public function create(Request $request, InvoiceRepository $repository)
    {
        $attribute = $repository->create($request);

        return view('panel.invoice.create', [
            'customer' => $attribute['customer'],
            'inventory' => $attribute['inventory']
        ]);
    }

    public function store(Request $request, INotification $notification, InvoiceRepository $repository)
    {
        $repository->store($request);
        $notification->messageNotification('Successfully created the
        invoice', 'success');

        return redirect()->back();
    }

    public function show($id, InvoiceRepository $repository)
    {
        $invoice = $repository->show($id);

        return view('panel.invoice.print', compact('invoice'));
    }

    public function edit($id, InvoiceRepository $repository)
    {
        $invoice = $repository->show($id);

        return view('panel.invoice.edit', compact('invoice'));
    }

    public function update(Request $request, $id, INotification $notification, InvoiceRepository $repository)
    {
        $invoice = $repository->update($request, $id);
        $notification->messageNotification('Successfully update the
            invoice', 'success');

        return redirect()->route('invoice.index', [
            'customerId' => $invoice->customer->id,
            'inventoryId' => $invoice->inventory->id
        ]);
    }

    public function destroy($id, INotification $notification, InvoiceRepository $repository)
    {
        $repository->destory($id);
        $notification->messageNotification('Successfully deleted the
            invoice', 'success');

        return redirect()->back();
    }

}
