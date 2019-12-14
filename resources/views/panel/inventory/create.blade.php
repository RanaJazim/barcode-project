@extends('panel.dashboard.main')

@section('title')
    Create Inventory
@endsection

@section('content')

    <div class="container">

        @well(['class'=>'success'])
            <p>Dashboard > Inventory > Create Record</p>
        @endwell

        @navigate
            <a href="{{ route('inventory.index') }}" class="btn btn-primary">Display All Record</a>
        @endnavigate


        @form
        <form action="{{ route('inventory.store')  }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="itemNumber">Item Number</label>
                <input type="text" class="form-control" name="itemNumber"
                       value="{{ old('itemNumber') }}" id="itemNumber">
            </div>

            <div class="form-group">
                <label for="companyName">Company Name</label>
                <input type="text" class="form-control" name="companyName"
                       value="{{ old('companyName') }}" id="companyName">
            </div>

            <div class="form-group">
                <label for="itemName">Item Name</label>
                <input type="text" class="form-control" name="itemName"
                       value="{{ old('itemName') }}" id="itemName">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" name="quantity"
                       value="{{ old('quantity') }}" id="quantity">
            </div>

            <div class="form-group">
                <label for="unitPrice">Unit Price</label>
                <input type="text" class="form-control" name="unitPrice"
                       value="{{ old('unitPrice') }}" id="unitPrice">
            </div>

            <div class="form-group">
                <label for="salePrice">Sale Price</label>
                <input type="text" class="form-control" name="salePrice"
                       value="{{ old('salePrice') }}" id="salePrice">
            </div>

            <div class="form-group">
                <label for="localForeign">Local / Foreign Purchase</label>
                <input type="text" class="form-control" name="localForeign"
                       value="{{ old('localForeign') }}" id="localForeign">
            </div>

            <div class="form-group">
                <label for="expiry">Expiry Date</label>
                <input type="date" class="form-control" name="expiry"
                       value="{{ old('expiry') }}" id="expiry">
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
