<?php

namespace App\Observers;

use App\Models\User;
use App\Models\HomePageSection;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;

class HomePageSectionObserver
{
    /**
     * Handle the HomePageSection "created" event.
     */
    public function created(HomePageSection $homePageSection): void
    {
        $recipients=User::role('super_admin')->get();
        foreach($recipients as $recipient){
            Notification::make()
            ->title('New Content created')
            ->body('Check content. <u> <a href="' . route('filament.admin.resources.home-section.view',$homePageSection->id) . '">here</a></u>')
            ->sendToDatabase($recipient);

        }
    }

    /**
     * Handle the HomePageSection "updated" event.
     */
    public function updated(HomePageSection $homePageSection): void
    {
        $recipients=User::role('super_admin')->get();
        foreach($recipients as $recipient){
            Notification::make()
            ->title('Content updated')
            ->body('View content. <u> <a href="' . route('filament.admin.resources.home-section.view',$homePageSection->id) . '">here</a></u>')
            ->sendToDatabase($recipient);
        }
    }

    /**
     * Handle the HomePageSection "deleted" event.
     */
    public function deleted(HomePageSection $homePageSection): void
    {
        //
    }

    /**
     * Handle the HomePageSection "restored" event.
     */
    public function restored(HomePageSection $homePageSection): void
    {
        //
    }

    /**
     * Handle the HomePageSection "force deleted" event.
     */
    public function forceDeleted(HomePageSection $homePageSection): void
    {
        //
    }
}
