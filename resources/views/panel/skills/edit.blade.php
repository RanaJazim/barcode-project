@extends('panel.dashboard.main')

@section('title')
    Edit Skills
@endsection

@section('content')
    
    <div class="container">

        @well(['class'=>'success'])
            <p>Dashboard > Skills > Edit Skills</p>
        @endwell


        @form
        <form action="{{ route('skills.update', ['userId'=>$skill->user->id, 'skill'=>$skill->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <input type="hidden" name="user_id" value="{{ $skill->user->id }}">

            <div class="form-group">
                <label for="title">Skill Title</label>
                <input type="text" class="form-control" name="title" value="{{ $skill->title }}" id="title">
            </div>  

            <div class="form-group">
                <label for="skillPercentage">Skill Percentage</label>
                <input type="number" class="form-control" name="skillPercentage" value="{{ $skill->skillPercentage }}" id="skillPercentage">
            </div>
            

            <input type="submit" class="btn btn-success" value="Submit">
            <input type="button" class="btn btn-danger" value="Clear">

        </form>
        @endform

    </div>

    
    <div class="mt-5"></div>

    @include('shared.notification.error')
    
@endsection