<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Rule;

class ContactForm extends Component
{


        #[Rule('required', message: 'Please provide your name')]
        #[Rule('min:3', message: 'The name is too short. It must be at least 3 characters long')]
        #[Rule('max:50', message: 'The name is too long. It can have a maximum of 50 characters')]
        #[Rule('regex:/^[a-zA-Z\s]+$/', message: 'The name can only contain letters and spaces')]
        public $name = '';

        #[Rule('required', message: 'Please provide your email address')]
        #[Rule('email', message: 'Please enter a valid email address')]
        #[Rule('min:3', message: 'The email is too short. It must be at least 3 characters long')]
        #[Rule('max:50', message: 'The email is too long. It can have a maximum of 50 characters')]
        public $email = '';

        #[Rule('required', message: 'Please provide a message')]
        #[Rule('min:3', message: 'The message is too short. It must be at least 3 characters long')]
        #[Rule('max:1000', message: 'The message is too long. It can have a maximum of 1000 characters')]
    public $message = '';

    public function ContactUs(){

        $validated=$this->validate();
        Contact::create($validated);
        session()->flash('success', 'Thanks for reaching out,'.$this->name.'!. We appreciate your message and will respond soon.!');
        $this->reset();
        $this->resetValidation(['name','email','message']);
        // $this->resetErrorBag();
        // $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
