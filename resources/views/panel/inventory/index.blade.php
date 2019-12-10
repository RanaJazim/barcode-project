@extends('panel.dashboard.main')

@section('title')
    Inventory Record
@endsection

@section('content')
    
    <div class="container">

        @well(['class'=>'info'])
            <p>Dashboard > Inventory > Inventory Record</p>
        @endwell

        @navigate
            <a href="{{ route('inventory.create') }}" class="btn btn-primary">Add New Record</a>
        @endnavigate

        @table(['title'=>'Inventries Record'])
        <thead>
            <tr>
                <th>Item Number</th>
                <th>Company Name</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Sale Price</th>
                <th>Local</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tbody>
                @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->itemNumber }}</td>
                        <td>{{ $inventory->companyName }}</td>
                        <td>{{ $inventory->itemName }}</td>
                        <td>{{ $inventory->quantity }}</td>
                        <td>{{ $inventory->unitPrice }}</td>
                        <td>{{ $inventory->salePrice }}</td>
                        <td>{{ $inventory->localForeign }}</td>

                        <td><a href="{{ route('inventory.edit', ['inventory'=>$inventory->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"><span style="margin-left: 5px;">Edit</span></i></a></td>

                        <td><a href="#" data-toggle="modal" data-target="#mediumModal{{$inventory->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"><span style="margin-left: 5px;">Delete</span></i></a></td>

                        @model(['obj' => $inventory])
                            @slot('modelTitle')
                                Delete Inventory Record
                            @endslot
                            @slot('modelBody')
                                <p>Are you sure you want to delete this item ??</p>
                            @endslot

                            <form action="{{ route('inventory.destroy', ['inventory'=>$inventory->id]) }}" method="POST">
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