<?php

namespace App\Custom\Notification;

interface INotification
{
    function messageNotification($message, $alert);
    function toastNotification($message, $alert);
}
