<?php

namespace App\Helpers;

class Notify
{
    // Helper methods for notification logic
    public static function success( $message)
    {
        // Logic to send notification to the user
        // This could be an email, SMS, or in-app notification
        return noty()->success($message);
    }

        public static function error( $message)
    {
        // Logic to send notification to the user
        // This could be an email, SMS, or in-app notification
        return noty()->error($message);
    }
}