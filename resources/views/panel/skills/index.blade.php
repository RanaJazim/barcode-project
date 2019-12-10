@extends('panel.dashboard.main')

@section('title')
    Skills Record
@endsection

@section('content')
    
    <div class="container">

        @well(['class'=>'info'])
            <p>Dashboard > Skills > Skill Record</p>
        @endwell

        @navigate
            <a href="{{ route('skills.create', ['userId'=>$user_id]) }}" class="btn btn-primary">Add New Record</a>
        @endnavigate

        @table(['title'=>'Skills Record'])
        <thead>
            <tr>
                <th>Sr Number</th>
                <th>Title</th>
                <th>Skill Percentage</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tbody>
                @foreach ($skills as $skill)
                    <tr>
                        <td>{{ $skill->id }}</td>
                        <td>{{ $skill->title }}</td>
                        <td>{{ $skill->skillPercentage }}</td>

                        <td><a href="{{ route('skills.edit', ['userId'=>$user_id, 'skill'=>$skill->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"><span style="margin-left: 5px;">Edit</span></i></a></td>

                        <td><a href="#" data-toggle="modal" data-target="#mediumModal{{$skill->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"><span style="margin-left: 5px;">Delete</span></i></a></td>

                        @model(['obj' => $skill])
                            @slot('modelTitle')
                                Delete Skill Record
                            @endslot
                            @slot('modelBody')
                                <p>Are you sure you want to delete this item ??</p>
                            @endslot

                            <form action="{{ route('skills.destroy', ['userId'=>$user_id, 'skill'=>$skill->id]) }}" method="POST">
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