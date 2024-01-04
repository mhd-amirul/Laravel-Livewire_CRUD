<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactList extends Component
{
    use WithPagination;

    protected $paginationTheme    = 'bootstrap';
    protected $listeners          = ['createContact' => 'render'];
    protected $queryString        = ['sort', 'search', 'sortType'];

    public $contact;
    public $sort        = 'name';
    public $search      = null;
    public $sortType    = true;

    public function render()
    {
        return view('livewire.contact-list', [
            'data' => $this->getContact()->orderBy($this->sort, $this->sortType ? 'asc' : 'desc')->paginate(10)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($field === $this->sort) {
            $this->sortType = !$this->sortType;
        } else {
            $this->sortType = true;
        }

        $this->sort = $field;
    }

    public function getContact()
    {
        $contactModel = new Contact();

        return $this->search
            ? $contactModel->searchByAllField($this->search)
            : $contactModel;
    }

    public function deleteContact($id)
    {
        $contact = Contact::findorfail($id);
        $status  = $contact->delete();

        session()->flash($status ? "success_msg" : "error_msg", $status ? "delete success!" : "failed to delete!");
    }
}
