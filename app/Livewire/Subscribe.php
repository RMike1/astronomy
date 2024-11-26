<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Subscriber;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Log;
use Filament\Forms\Components\Builder;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminSubscribeNotification;
use App\Notifications\WelcomeUserSubscribeNotification;

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

        $recipients = User::role('super_admin')->get();

        
        $link=route('filament.admin.resources.subscribers.index');
        $messageAdmin='User with this email ' . $subscriber->email . ' has subscribed to our app';
        $welcome_message='Thank you for subscribing, we\'ll keep you updated with our latests!!';
        foreach($recipients as $recipient){
            Notification::send($recipient, new AdminSubscribeNotification($messageAdmin,$link));
        }

        $subscriber->notify(new WelcomeUserSubscribeNotification($welcome_message));

        $this->reset();
    }
    public function render()
    {
        return view('livewire.subscribe');
    }
}
