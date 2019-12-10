@if(count($errors) > 0)
    @inject('alert', 'App\Custom\Notification\INotification')
    @php 
        $alert->toastNotification('Something Wrong', 'error'); 
    @endphp
    @include('shared.notification.errors')
@endif