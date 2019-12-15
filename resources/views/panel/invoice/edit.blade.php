@extends('panel.dashboard.main')

@section('title')
    Edit Invoice
@endsection

@section('content')

    <div class="container">

        @well(['class'=>'success'])
        <p>Dashboard > Invoice > Edit Invoice</p>
        @endwell


        @form
        <form action="{{ route('invoice.update', ['id'=>$invoice->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <input type="hidden" name="customer_id" value="{{$invoice->customer->id}}">
            <input type="hidden" name="inventory_id" value="{{$invoice->inventory->id}}">

            <div class="form-group">
                <label for="customerName">Customer Name</label>
                <input readonly type="text" class="form-control" name="customerName"
                       value="{{ $invoice->customer->customerName }}" id="customerName">
            </div>

            <div class="form-group">
                <label for="itemName">Item Name</label>
                <input readonly type="text" id="itemName" class="form-control"
                       name="itemName" value="{{ $invoice->inventory->itemName }}">
            </div>

            <div class="form-group">
                <label for="onDate">On Date</label>
                <input readonly type="date" name="onDate" id="onDate"
                        class="form-control" value="{{ $invoice->onDate }}">
            </div>

            <div class="form-group">
                <label for="dueDate">Due Date</label>
                <input type="date" id="dueDate" class="form-control"
                       name="dueDate" value="{{ $invoice->dueDate }}">
            </div>

            <div class="form-group">
                <label for="incNumber">Inc Number</label>
                <input type="text" id="incNumber" class="form-control"
                       name="incNumber" value="{{ $invoice->incNumber }}">
            </div>

            <div class="form-group">
                <label for="batchNumber">Batch Number</label>
                <input type="text" id="batchNumber" class="form-control"
                       name="batchNumber" value="{{ $invoice->batchNumber }}">
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" id="qty" class="form-control"
                       name="qty" value="{{ $invoice->qty }}">
            </div>

            <div class="form-group">
                <label for="unitPrice">Unit Price</label>
                <input type="number" id="unitPrice" class="form-control"
                       name="unitPrice" value="{{ $invoice->unitPrice }}">
            </div>

            <div class="form-group">
                <label for="discount">Discount</label>
                <input type="number" id="discount" class="form-control"
                       name="discount" value="{{ $invoice->discount }}">
            </div>

            <div class="form-group">
                <label for="gst">GST</label>
                <input readonly type="number" id="gst" name="gst"
                       class="form-control" value="17">
            </div>


            <input type="submit" class="btn btn-success" value="Submit">

        </form>
        @endform

    </div>


    <div class="mt-5"></div>

    @include('shared.notification.error')

@endsection

@push('scripting')
    @include('shared.notification.alert')
@endpush
