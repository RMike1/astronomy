<?php

namespace App\Observers;

use App\Models\Subscriber;
use App\Models\User;
use Filament\Notifications\Notification;

class SubscriberObserver
{
    /**
     * Handle the Subscriber "created" event.
     */
    public function created(Subscriber $subscriber): void
    {
        $recipients = User::role('super_admin')->get();

        foreach($recipients as $recipient){

            Notification::make()
            ->title('New Subscriber')
            ->body('User with this email ' . $subscriber->email . ' has subscribed to our app. <a href="' . route('filament.admin.resources.subscribers.index') . '">View Subscribers</a>')
            ->sendToDatabase($recipient);
        }
    }

    /**
     * Handle the Subscriber "updated" event.
     */
    public function updated(Subscriber $subscriber): void
    {
        //
    }

    /**
     * Handle the Subscriber "deleted" event.
     */
    public function deleted(Subscriber $subscriber): void
    {
        //
    }

    /**
     * Handle the Subscriber "restored" event.
     */
    public function restored(Subscriber $subscriber): void
    {
        //
    }

    /**
     * Handle the Subscriber "force deleted" event.
     */
    public function forceDeleted(Subscriber $subscriber): void
    {
        //
    }
}
