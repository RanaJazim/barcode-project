@extends('panel.dashboard.main')

@section('title')
    Service Record
@endsection

@section('content')
    
    <div class="container">

        @well(['class'=>'info'])
            <p>Dashboard > Services > All Services</p>
        @endwell

        @navigate
            <a href="{{ route('services.create', ['userId'=>$user_id]) }}" class="btn btn-primary">Add New Service</a>
        @endnavigate

        @table(['title'=>'Service Record'])
        <thead>
            <tr>
                <th>Sr Number</th>
                <th>Service Icon</th>
                <th>Service Title</th>
                <th>Service Short Description</th>
                <th>Service Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>
                            @icon(['title'=>$service->icon])
                            @endicon
                        </td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->shortDescription }}</td>
                        <td>{{ $service->price }}</td>

                        <td><a href="{{ route('services.edit', ['userId'=>$user_id, 'service'=>$service->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"><span style="margin-left: 5px;">Edit</span></i></a></td>

                        <td><a href="#" data-toggle="modal" data-target="#mediumModal{{$service->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"><span style="margin-left: 5px;">Delete</span></i></a></td>

                        @model(['obj' => $service])
                            @slot('modelTitle')
                                Delete Service Record
                            @endslot
                            @slot('modelBody')
                                <p>Are you sure you want to delete this item ??</p>
                            @endslot

                            <form action="{{ route('services.destroy', ['userId'=>$user_id, 'service'=>$service->id]) }}" method="POST">
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