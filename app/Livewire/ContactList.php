<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactList extends Component
{
    public $contact;

    protected $listeners = ['createContact' => 'render'];

    public function render()
    {
        $this->contact = $this->getContact();

        return view('livewire.contact-list');
    }

    public function getContact() {
        return Contact::latest()->limit(8)->get();
    }

    public function deleteContact($id) {
        $contact = Contact::findorfail($id);
        $status  = $contact->delete();

        session()->flash($status ? "success_msg" : "error_msg", $status ? "delete success!" : "failed to delete!");
    }
}
