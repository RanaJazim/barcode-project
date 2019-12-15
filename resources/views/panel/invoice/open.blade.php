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
        <a href="{{ route('customer.index') }}" class="btn btn-primary"
           data-toggle="modal" data-target="#mediumModal{{$data->id}}">
            Get Invoice
        </a>
        @endnavigate

    </div>

    @model(['obj' => $data])
    @slot('modelTitle')
        Go to Invoice Section
    @endslot
    @slot('modelBody')
        <p>Please click on one Button below</p>

        <form action="{{route('invoice.create')}}" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        @if(count($customers) > 0)
                            <label for="customers">Customers</label>
                            <select name="customer_id" id="customers" class="form-control">
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">
                                        {{$customer->customerName}}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <div>
                                <p>Please create Customer First</p>
                                <a href="{{ route('customer.create') }}">Create Customer</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        @if(count($inventories) > 0)
                            <label for="inventories">Inventories</label>
                            <select name="inventory_id" id="inventories" class="form-control">
                                @foreach($inventories as $inventory)
                                    <option value="{{$inventory->id}}">
                                        {{ $inventory->itemNumber }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <div>
                                <p>Please create Inventory First</p>
                                <a href="{{ route('inventory.create') }}">Create Inventory</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-success" value="Go to Invoice Section">
        </form>
    @endslot



{{--    <form action=""--}}
{{--          method="POST">--}}
{{--        @csrf--}}
{{--        @method('DELETE')--}}

{{--        <input type="submit" value="Yes" class="btn btn-success">--}}
{{--    </form>--}}
    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
    @endmodel


    <div class="mt-5"></div>

    @include('shared.notification.error')

@endsection

@push('scripting')
    @include('shared.notification.alert')
@endpush
