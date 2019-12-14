@extends('panel.dashboard.main')

@section('title')
    Edit Customer
@endsection

@section('content')

    <div class="container">

        @well(['class'=>'success'])
        <p>Dashboard > Customer > Edit Customer</p>
        @endwell


        @form
        <form action="{{ route('customer.update', ['customer'=>$customer->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="customerName">Customer Name</label>
                <input type="text" class="form-control" name="customerName"
                       value="{{ $customer->customerName }}" id="customerName">
            </div>

            <div class="form-group">
                <label for="customerAddress">Customer Address</label>
                <input type="text" class="form-control" name="customerAddress"
                       value="{{ $customer->customerAddress }}" id="customerAddress">
            </div>

            <div class="form-group">
                <label for="mobileNumber">Customer Mobile Number</label>
                <input type="number" class="form-control" name="mobileNumber"
                       value="{{ $customer->mobileNumber }}" id="mobileNumber">
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
