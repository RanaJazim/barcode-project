@extends('panel.dashboard.main')

@section('title')
    Edits Services
@endsection

@section('content')
    
    <div class="container">

        @well(['class'=>'success'])
            <p>Dashboard > Services > Edit Service</p>
        @endwell

        @form
        <form action="{{ route('services.update', ['userId'=>$service->user->id, 'service'=>$service->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <input type="hidden" name="user_id" value="{{ $service->user->id }}">

            <div class="form-group">
                <label for="icon">Service Icon</label>
                <input type="text" class="form-control" name="icon" value="{{ $service->icon }}" id="icon" placeholder="Paste the icon e.g. fa-facebook">
            </div>  

            <div class="form-group">
                <label for="title">Service Title</label>
                <input type="text" class="form-control" name="title" value="{{ $service->title }}" id="title">
            </div>

            <div class="form-group">
                <label for="shortDescription">Short Description for Your Service</label>
                <textarea class="form-control" rows="5" id="shortDescription" name="shortDescription">{{ $service->shortDescription }}</textarea>
              </div>

            <div class="form-group">
                <label for="price">Service Price </label>
                <input type="number" class="form-control" name="price" value="{{ $service->price }}" id="price" placeholder="Price in Rs.">
            </div>
            

            <input type="submit" class="btn btn-success" value="Submit">
            <input type="button" class="btn btn-danger" value="Clear">

        </form>
        @endform

    </div>

    
    <div class="mt-5"></div>

    @include('shared.notification.error')
    
@endsection
