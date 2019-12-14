@extends('panel.dashboard.main')

@section('title')
    Create Invoice
@endsection

@section('content')

    <div class="container">

        @well(['class'=>'success'])
        <p>Dashboard > Invoice > Create Invoice</p>
        @endwell

        @navigate
        <a href="{{ route('customer.index') }}" class="btn btn-primary">
            Display All Invoices
        </a>
        @endnavigate


        @form
        <form action="" method="POST">
            @csrf
            <input type="hidden" name="customer_id" value="{{$customer->id}}">
            <input type="hidden" name="inventory_id" value="{{inventory->id}}">

            <div class="form-group">
                <label for="customerName">Customer Name</label>
                <input readonly type="text" class="form-control" name="customerName"
                       value="{{ $customer->customerName }}" id="customerName">
            </div>

            <div class="form-group">
                <label for="itemName">Item Name</label>
                <input readonly type="text" id="itemName" class="form-control"
                       name="itemName" value="{{ $invoice->itemName }}">
            </div>


            <input type="submit" class="btn btn-success" value="Submit">
            <input type="button" class="btn btn-danger" value="Clear">

        </form>
        @endform

    </div>


    <div class="mt-5"></div>

    @include('shared.notification.error')

@endsection

@push('scripting')
    @include('shared.notification.alert')
@endpush
