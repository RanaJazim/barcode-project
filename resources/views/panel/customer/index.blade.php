@extends('panel.dashboard.main')

@section('title')
    Customers Record
@endsection

@section('content')

    <div class="container">

        @well(['class'=>'info'])
        <p>Dashboard > Customer > Customer Record</p>
        @endwell

        @navigate
        <a href="{{ route('customer.create') }}" class="btn btn-primary">
            Add New Customer
        </a>
        @endnavigate

        @table(['title'=>'Customers Record'])
        <thead>
        <tr>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Customer Mobile Number</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->customerName }}</td>
                <td>{{ $customer->customerAddress }}</td>
                <td>{{ $customer->mobileNumber }}</td>

                <td>
                    <a href="{{ route('customer.edit', ['customer'=>$customer->id]) }}"
                       class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil">
                            <span style="margin-left: 5px;">Edit</span>
                        </i>
                    </a>
                </td>

                <td>
                    <a href="#" data-toggle="modal" data-target="#mediumModal{{$customer->id}}"
                       class="btn btn-danger btn-sm">
                        <i class="fa fa-trash">
                            <span style="margin-left: 5px;">Delete</span>
                        </i>
                    </a>
                </td>

                @model(['obj' => $customer])
                @slot('modelTitle')
                    Delete Customer Record
                @endslot
                @slot('modelBody')
                    <p>Are you sure you want to delete this item ??</p>
                @endslot

                <form action="{{ route('customer.destroy', ['customer'=>$customer->id]) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Yes" class="btn btn-success">
                </form>
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                @endmodel
            </tr>
        @endforeach
        </tbody>
        </thead>
        @endtable

    </div>

@endsection

@push('scripting')
    @include('shared.notification.alert')
@endpush
