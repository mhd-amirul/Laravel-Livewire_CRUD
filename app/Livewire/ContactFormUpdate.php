<?php

namespace App\Livewire;

use Livewire\Component;

class ContactFormUpdate extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;
    public $contact;
    protected $rules = [
        'name'      => 'required|min:5',
        'email'     => 'required|email:rfc,dns',
        'phone'     => 'required|numeric|min:4',
        'comment'   => 'required|min:10',
    ];

    public function render()
    {
        return view('livewire.contact-form-update');
    }

    public function mount()
    {
        $this->name = $this->contact->name;
        $this->email = $this->contact->email;
        $this->phone = $this->contact->phone;
        $this->comment = $this->contact->comment;
    }

    public function submitForm()
    {
        $contact = $this->validate();

        try {
            $this->contact->update($contact);

            // Mail::to('amirul@mail.com')->send(new ContactFormMailer($contact));
        } catch (\Exception $e) {
            session()->flash('error_msg', 'error: ' . $e->getMessage());

            return;
        }

        session()->flash('success_msg', 'data updated!');

        return $this->redirect('/contact', navigate: true);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
