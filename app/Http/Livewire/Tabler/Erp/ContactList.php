<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Contact;
use App\Models\Projet;
use Livewire\Component;

class ContactList extends Component
{
    public $projet, $search;
    public $projet_id, $devis_id, $devis;
    public $contact_id, $firstname, $lastname, $description, $avatar;


    protected $listeners = ['reload' => 'render'];

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
        $this->projet = Projet::find($projet_id);
    }

    public function render()
    {
        return view('livewire.tabler.erp.contact-list',[
            'contacts' => Contact::all(),
        ]);
    }

    // Contact

    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'description' => 'required',
    ];

    public function add_contact()
    {
        $this->validate($this->rules);
        Contact::create([
            'projet_id' => $this->projet_id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'description' => $this->description,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit_contact($contact_id)
    {
        $this->contact_id = $contact_id;
        $contact = Contact::find($contact_id);
        $this->firstname = $contact->firstname;
        $this->lastname = $contact->lastname;
        $this->description = $contact->description;
    }

    public function update_contact()
    {
        $contact = Contact::find($this->contact_id);
        $contact->firstname = $this->firstname;
        $contact->lastname = $this->lastname;
        $contact->description = $this->description;
        $contact->save();
        $this->reset('contact_id');
        $this->render();
    }
    public function delete_contact()
    {
        $contact = Contact::find($this->contact_id);

        $contact->delete();
        $this->render();
    }
}
