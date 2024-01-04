<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactList extends Component
{
    use WithPagination;

    public $contact;
    public $search = null;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['createContact' => 'render'];

    public function render()
    {
        // $this->contact = $this->getContact();

        return view('livewire.contact-list', [
            'data' => $this->getContact()
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getContact()
    {
        $search       = $this->search;
        $contactModel = new Contact();

        return $search
            ? $contactModel->searchByAllField($search)->limit(10)->paginate(10)
            : $contactModel->latest()->paginate(10);
    }

    public function deleteContact($id)
    {
        $contact = Contact::findorfail($id);
        $status  = $contact->delete();

        session()->flash($status ? "success_msg" : "error_msg", $status ? "delete success!" : "failed to delete!");
    }
}
