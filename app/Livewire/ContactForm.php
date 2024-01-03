<?php

namespace App\Livewire;

use App\Mail\ContactFormMailer;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    protected $rules = [
        'name'      => 'required|min:5',
        'email'     => 'required|email:rfc,dns',
        'phone'     => 'required|numeric|min:4',
        'comment'   => 'required|min:10',
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function submitForm()
    {
        $contact = $this->validate();

        try {
            Contact::create($contact);

            // Mail::to('amirul@mail.com')->send(new ContactFormMailer($contact));
        } catch (\Exception $e) {
            session()->flash('error_msg', 'error: ' . $e->getMessage());

            return;
        }

        $this->reset();

        session()->flash('success_msg', 'email was sent!');

        $this->dispatch('createContact');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
