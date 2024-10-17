<?php

namespace App\Livewire;

use App\Models\Subscriber;
use Livewire\Attributes\Rule;
use Livewire\Component;

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

        Subscriber::create($validated);
        session()->flash('success', "Thanks for subscribing! We'll keep you updated with the latest news!");
        $this->reset();
    }
    public function render()
    {
        return view('livewire.subscribe');
    }
}
