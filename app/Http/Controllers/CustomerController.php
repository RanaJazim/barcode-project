<?php

namespace App\Http\Controllers;

use App\Custom\Notification\INotification;
use App\Custom\Repository\Customer\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(CustomerRepository $repository)
    {
        $customers = $repository->getAllRecord();

        return view('panel.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('panel.customer.create');
    }

    public function store(Request $request, INotification $notification, CustomerRepository $repository)
    {
        $repository->store($request);
        $notification->messageNotification('Successfully created
            the customer','success');

        return redirect()->back();
    }

    public function edit($id, CustomerRepository $repository)
    {
        $customer = $repository->edit($id);

        return view('panel.customer.edit', compact('customer'));
    }

    public function update(Request $request, $id, INotification $notification, CustomerRepository $repository)
    {
        $repository->update($request, $id);
        $notification->messageNotification('Successfully update
            the customer', 'success');

        return redirect()->route('customer.index');
    }

    public function destroy($id, INotification $notification, CustomerRepository $repository)
    {
        $repository->destory($id);
        $notification->messageNotification('Successfully deleted
            the customer', 'success');

        return redirect()->back();
    }

}
