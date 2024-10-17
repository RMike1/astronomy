<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ContactForm extends Component
{


    #[Validate('required', message: 'Please provide your name')]
    #[Validate('min:3', message: 'The name is too short. It must be at least 3 characters long')]
    #[Validate('max:50', message: 'The name is too long. It can have a maximum of 50 characters')]
    #[Validate('regex:/^[a-zA-Z\s]+$/', message: 'The name can only contain letters and spaces')]
    public $name = '';

    #[Validate('required', message: 'Please provide your email address')]
    #[Validate('email', message: 'Please enter a valid email address')]
    #[Validate('min:3', message: 'The email is too short. It must be at least 3 characters long')]
    #[Validate('max:50', message: 'The email is too long. It can have a maximum of 50 characters')]
    public $email = '';

    #[Validate('required', message: 'Please provide a message')]
    #[Validate('min:3', message: 'The message is too short. It must be at least 3 characters long')]
    #[Validate('max:1000', message: 'The message is too long. It can have a maximum of 1000 characters')]
    public $message = '';


    public function ContactUs(){

        $validated=$this->validate();
        Contact::create($validated);
        $this->reset();
        session()->flash('success', 'created successfully!!');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
