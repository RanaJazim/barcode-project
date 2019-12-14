@extends('panel.dashboard.main')

@section('title')
    Create Customer
@endsection

@section('content')

    <div class="container">

        @well(['class'=>'success'])
        <p>Dashboard > Customer > Create Customer</p>
        @endwell

        @navigate
        <a href="{{ route('customer.index') }}" class="btn btn-primary">
            Display All Customers
        </a>
        @endnavigate


        @form
        <form action="{{ route('customer.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="customerName">Customer Name</label>
                <input type="text" class="form-control" name="customerName"
                       value="{{ old('customerName') }}" id="customerName">
            </div>

            <div class="form-group">
                <label for="customerAddress">Customer Address</label>
                <input type="text" class="form-control" name="customerAddress"
                       value="{{ old('customerAddress') }}" id="customerAddress">
            </div>

            <div class="form-group">
                <label for="mobileNumber">Customer Mobile Number</label>
                <input type="number" class="form-control" name="mobileNumber"
                       value="{{ old('mobileNumber') }}" id="mobileNumber">
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
