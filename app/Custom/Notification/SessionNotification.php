<?php

namespace App\Custom\Notification;

use Session;

class SessionNotification implements INotification
{
    public function messageNotification($message, $alert)
    {
        Session::flash('message', $message); 
		Session::flash('alert-class', $alert);
    }

    public function toastNotification($message, $alert)
    {
    }
}
