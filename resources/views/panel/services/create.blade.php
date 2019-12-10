@extends('panel.dashboard.main')

@section('title')
    Create Services
@endsection

@section('content')
    
    <div class="container">

        @well(['class'=>'success'])
            <p>Dashboard > Services > Create Service</p>
        @endwell

        @navigate
            <a href="{{ route('services.index', ['userId'=>1]) }}" class="btn btn-primary">Display All Services</a>
        @endnavigate

        @form
        <form action="{{ route('services.store', ['userId'=>1]) }}" method="POST">
            @csrf

            <input type="hidden" name="user_id" value="1">

            <div class="form-group">
                <label for="icon">Service Icon</label>
                <input type="text" class="form-control" name="icon" value="{{ old('icon') }}" id="icon" placeholder="Paste the icon e.g. fa-facebook">
            </div>  

            <div class="form-group">
                <label for="title">Service Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title">
            </div>

            <div class="form-group">
                <label for="shortDescription">Short Description for Your Service</label>
                <textarea class="form-control" rows="5" id="shortDescription" name="shortDescription">{{ old('shortDescription') }}</textarea>
              </div>

            <div class="form-group">
                <label for="price">Service Price </label>
                <input type="number" class="form-control" name="price" value="{{ old('price') }}" id="price" placeholder="Price in Rs.">
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