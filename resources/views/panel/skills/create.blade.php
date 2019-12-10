@extends('panel.dashboard.main')

@section('title')
    Create Skills
@endsection

@section('content')
    
    <div class="container">

        @well(['class'=>'success'])
            <p>Dashboard > Skills > Create Record</p>
        @endwell

        @navigate
            <a href="{{ route('skills.index', ['userId'=>1]) }}" class="btn btn-primary">Display All Record</a>
        @endnavigate

        @form
        <form action="{{ route('skills.store', ['userId'=>1]) }}" method="POST">
            @csrf

            <input type="hidden" name="user_id" value="1">

            <div class="form-group">
                <label for="title">Skill Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title">
            </div>  

            <div class="form-group">
                <label for="skillPercentage">Skill Percentage</label>
                <input type="number" class="form-control" name="skillPercentage" value="{{ old('skillPercentage') }}" id="skillPercentage">
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