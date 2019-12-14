<?php

namespace App\Http\Controllers;

use App\Custom\Notification\INotification;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('panel.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('panel.customer.create');
    }

    public function store(Request $request, INotification $notification)
    {
        $attributes = $this->validation($request);
        Customer::create($attributes);

        $notification->messageNotification('Successfully created
            the customer','success');
        return redirect()->back();
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('panel.customer.edit', compact('customer'));
    }

    public function update(Request $request, $id, INotification $notification)
    {
        $attributes = $this->validation($request);
        Customer::findOrFail($id)->update($attributes);

        $notification->messageNotification('Successfully update
            the customer', 'success');
        return redirect()->route('customer.index');
    }

    public function destroy($id, INotification $notification)
    {
        Customer::findOrFail($id)->delete();
        $notification->messageNotification('Successfully deleted
            the customer', 'success');

        return redirect()->back();
    }

    private function validation($values)
    {
        return $values->validate([
            'customerName' => 'required',
            'customerAddress' => 'required',
            'mobileNumber' => 'required',
        ]);
    }

}
