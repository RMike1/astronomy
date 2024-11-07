<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Subscriber;
use Filament\Forms\Components\Builder;
use Livewire\Attributes\Rule;
use Filament\Notifications\Notification;

class Subscribe extends Component
{
    #[Rule('required', message: 'Please provide your email address')]
    #[Rule('email', message: 'Please enter a valid email address')]
    #[Rule('unique:subscribers,email', message: 'This email is already subscribed.')]
    #[Rule('max:50', message: 'The email is too long. It can have a maximum of 50 characters')]
    public $email = '';

    public function subscribing()
    {

        $validated = $this->validate();

        $exist_subscriber = Subscriber::where('email', $validated['email'])->exists();
        if ($exist_subscriber) {
            return
            session()->flash('warning', "You're already subscribed! Stay tuned for the latest updates");
        }

        $subscriber=Subscriber::create($validated);
        session()->flash('success', "Thanks for subscribing! We'll keep you updated with the latest news!");

        // $recipients=User::role('super_admin')->get()->pluck('id')->toArray();
        $recipients = User::role('super_admin')->get();

        foreach($recipients as $recipient){
            Notification::make()
            ->title('New Subscriber')
            ->body('User with this email ' . $subscriber->email . ' has subscribed to our app. <a href="' . route('filament.admin.resources.subscribers.index') . '">View Subscribers</a>')
            ->sendToDatabase($recipient);
        }
        $this->reset();
    }
    public function render()
    {
        return view('livewire.subscribe');
    }
}
