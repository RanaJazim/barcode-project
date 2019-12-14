<?php

namespace App\Http\Controllers;

use App\Custom\Notification\INotification;
use App\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();

        return view('panel.inventory.index', compact('inventories'));
    }

    public function create()
    {
        return view('panel.inventory.create');
    }

    public function store(Request $request, INotification $notification)
    {
        $attributes = $this->validation($request);
        Inventory::create($attributes);

        $notification->messageNotification('Successfully created
            the inventory', 'success');
        return redirect()->back();
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);

        return view('panel.inventory.edit', compact('inventory'));
    }

    public function update(Request $request, $id, INotification $notification)
    {
        $attributes = $this->validation($request);
        Inventory::findOrFail($id)->update($attributes);

        $notification->messageNotification('Successfully update the
            inventory', 'success');
        return redirect()->route('inventory.index');
    }

    public function destroy($id, INotification $notification)
    {
        Inventory::findOrFail($id)->delete();
        $notification->messageNotification('Successfully deleted
            the inventory', 'success');

        return redirect()->back();
    }

    private function validation($values)
    {
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
