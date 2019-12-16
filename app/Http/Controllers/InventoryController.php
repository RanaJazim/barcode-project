<?php

namespace App\Http\Controllers;

use App\Custom\Notification\INotification;
use App\Custom\Repository\Inventory\InventoryRepository;
use App\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(InventoryRepository $repository)
    {
        $inventories = $repository->getAllRecord();

        return view('panel.inventory.index', compact('inventories'));
    }

    public function create()
    {
        return view('panel.inventory.create');
    }

    public function store(Request $request, INotification $notification, InventoryRepository $repository)
    {
        $repository->store($request);
        $notification->messageNotification('Successfully created
            the inventory', 'success');

        return redirect()->back();
    }

    public function edit($id, InventoryRepository $repository)
    {
        $inventory = Inventory::findOrFail($id);

        return view('panel.inventory.edit', compact('inventory'));
    }

    public function update(Request $request, $id, INotification $notification, InventoryRepository $repository)
    {
        $repository->update($request, $id);
        $notification->messageNotification('Successfully update the
            inventory', 'success');

        return redirect()->route('inventory.index');
    }

    public function destroy($id, INotification $notification, InventoryRepository $repository)
    {
        $repository->destory($id);
        $notification->messageNotification('Successfully deleted
            the inventory', 'success');

        return redirect()->back();
    }

}
