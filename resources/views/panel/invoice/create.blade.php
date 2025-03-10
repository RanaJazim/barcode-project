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
        <a href="{{ route('invoice.index', ['customerId'=>$customer->id,
                'inventoryId'=>$inventory->id]) }}" class="btn btn-primary">
            Display All Invoices
        </a>
        @endnavigate


        @form
        <form action="{{ route('invoice.store') }}" method="POST">
            @csrf

            <input type="hidden" name="customer_id" value="{{$customer->id}}">
            <input type="hidden" name="inventory_id" value="{{$inventory->id}}">

            <div class="form-group">
                <label for="customerName">Customer Name</label>
                <input readonly type="text" class="form-control" name="customerName"
                       value="{{ $customer->customerName }}" id="customerName">
            </div>

            <div class="form-group">
                <label for="itemName">Item Name</label>
                <input readonly type="text" id="itemName" class="form-control"
                       name="itemName" value="{{ $inventory->itemName }}">
            </div>

            <div class="form-group">
                <label for="dueDate">Due Date</label>
                <input type="date" id="dueDate" class="form-control"
                        name="dueDate" value="{{ old('dueDate') }}">
            </div>

            <div class="form-group">
                <label for="incNumber">Inc Number</label>
                <input type="text" id="incNumber" class="form-control"
                       name="incNumber" value="{{ old('incNumber') }}">
            </div>

            <div class="form-group">
                <label for="batchNumber">Batch Number</label>
                <input type="text" id="batchNumber" class="form-control"
                       name="batchNumber" value="{{ old('batchNumber') }}">
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" id="qty" class="form-control"
                       name="qty" value="{{ old('qty') }}">
            </div>

            <div class="form-group">
                <label for="unitPrice">Unit Price</label>
                <input type="number" id="unitPrice" class="form-control"
                       name="unitPrice" value="{{ old('unitPrice') }}">
            </div>

            <div class="form-group">
                <label for="discount">Discount</label>
                <input type="number" id="discount" class="form-control"
                       name="discount" value="{{ old('discount') }}">
            </div>

            <div class="form-group">
                <label for="gst">GST</label>
                <input readonly type="number" id="gst" name="gst"
                       class="form-control" value="17">
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
