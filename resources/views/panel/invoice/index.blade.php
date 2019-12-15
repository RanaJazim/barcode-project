@extends('panel.dashboard.main')

@section('title')
    Invoice Record
@endsection

@section('content')

    <div class="container">

        @well(['class'=>'info'])
        <p>Dashboard > Invoice > Invoice Record</p>
        @endwell

        @navigate
            <a href="{{ route('invoice.open') }}" class="btn btn-primary">
                Add New Invoice
            </a>
        @endnavigate

        @table(['title'=>'Skills Record'])
        <thead>
        <tr>
            <th>On Date</th>
            <th>Due Date</th>
            <th>Inc Number</th>
            <th>Batch Number</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Discount</th>
            <th>GST</th>
            <th>Final Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tbody>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->onDate }}</td>
                <td>{{ $invoice->dueDate }}</td>
                <td>{{ $invoice->incNumber }}</td>
                <td>{{ $invoice->batchNumber }}</td>
                <td>{{ $invoice->qty }}</td>
                <td>{{ $invoice->unitPrice }}</td>
                <td>{{ $invoice->discount }}</td>
                <td>17</td>
                <td>{{ $invoice->finalPrice }}</td>

                <td>
                    <a href="{{ route('invoice.edit', ['id'=>$invoice->id]) }}"
                       class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil">
                            <span style="margin-left: 5px;">Edit</span>
                        </i>
                    </a>
                </td>

                <td>
                    <a href="#" data-toggle="modal" data-target="#mediumModal{{$invoice->id}}"
                       class="btn btn-danger btn-sm">
                        <i class="fa fa-trash">
                            <span style="margin-left: 5px;">Delete</span>
                        </i>
                    </a>
                </td>

                @model(['obj' => $invoice])
                @slot('modelTitle')
                    Delete Skill Record
                @endslot
                @slot('modelBody')
                    <p>Are you sure you want to delete this item ??</p>
                @endslot

                <form action="{{ route('invoice.destroy', ['id'=>$invoice->id]) }}" method="POST">
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
