
@if(count($errors) > 0)

<div class="container">
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)

            <li class="ml-5">{{ $error }}</li>

        @endforeach
    </ul>
</div>

@endif

