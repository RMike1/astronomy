<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminContactNotification;
use App\Notifications\WelcomeUserMailNotification;

class ContactForm extends Component
{


    #[Rule('required', message: 'Please provide your name')]
    #[Rule('min:3', message: 'The name is too short. It must be at least 3 characters long')]
    #[Rule('max:50', message: 'The name is too long. It can have a maximum of 50 characters')]
    #[Rule('regex:/^[a-zA-Z\s]+$/', message: 'The name can only contain letters and spaces')]
    public $name = '';

    #[Rule('required', message: 'Please provide your email address')]
    #[Rule('email', message: 'Please enter a valid email address')]
    #[Rule('max:50', message: 'The email is too long. It can have a maximum of 50 characters')]
    public $email = '';

    #[Rule('required', message: 'Please provide a message')]
    #[Rule('min:3', message: 'The message is too short. It must be at least 3 characters long')]
    #[Rule('max:1000', message: 'The message is too long. It can have a maximum of 1000 characters')]

    public $message = '';

    public function ContactUs()
    {

        $validated = $this->validate();
        $mailer = Contact::create($validated);
        session()->flash('success', 'Thanks for reaching out,' . $this->name . '!. We appreciate your message and will respond soon.!');

        $recipients = User::role('super_admin')->get();

        $messageAdmin = "Mail from " . $mailer->name." : ". $mailer->message."";
        $welcome_message='Thank you for reaching out,' . $this->name . '!. We appreciate your message and will respond soon.!';

        foreach ($recipients as $recipient) {
            Notification::send($recipient, new AdminContactNotification($messageAdmin));
        }
        $mailer->notify(new WelcomeUserMailNotification($welcome_message));

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}