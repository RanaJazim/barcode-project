<?php

namespace App\Custom\Notification;

// include the SweetAlert Class
use RealRashid\SweetAlert\Facades\Alert;

class AlertNotification implements INotification
{
    public function messageNotification($message, $alert)
    {
        Alert::alert('', $message, $alert);
    }

    public function toastNotification($message, $alert)
    {
        toast($message, $alert);
    }
}
