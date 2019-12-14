@extends('panel.dashboard.main')

@section('title')
    Edit Inventory
@endsection

@section('content')

    <div class="container">

        @well(['class'=>'success'])
            <p>Dashboard > Inventory > Edit Inventory</p>
        @endwell

        @form
        <form action="{{ route('inventory.update', ['inventory'=>$inventory->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="itemNumber">Item Number</label>
                <input type="text" class="form-control" name="itemNumber"
                       value="{{ $inventory->itemNumber }}" id="itemNumber">
            </div>

            <div class="form-group">
                <label for="companyName">Company Name</label>
                <input type="text" class="form-control" name="companyName"
                       value="{{ $inventory->companyName }}" id="companyName">
            </div>

            <div class="form-group">
                <label for="itemName">Item Name</label>
                <input type="text" class="form-control" name="itemName"
                       value="{{ $inventory->itemName }}" id="itemName">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" name="quantity"
                       value="{{ $inventory->quantity }}" id="quantity">
            </div>

            <div class="form-group">
                <label for="unitPrice">Unit Price</label>
                <input type="text" class="form-control" name="unitPrice"
                       value="{{ $inventory->unitPrice }}" id="unitPrice">
            </div>

            <div class="form-group">
                <label for="salePrice">Sale Price</label>
                <input type="text" class="form-control" name="salePrice"
                       value="{{ $inventory->salePrice }}" id="salePrice">
            </div>

            <div class="form-group">
                <label for="localForeign">Local / Foreign Purchase</label>
                <input type="text" class="form-control" name="localForeign"
                       value="{{ $inventory->localForeign }}" id="localForeign">
            </div>

            <div class="form-group">
                <label for="expiry">Expiry Date</label>
                <input type="date" class="form-control" name="expiry"
                       value="{{ $inventory->expiry }}" id="expiry">
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
