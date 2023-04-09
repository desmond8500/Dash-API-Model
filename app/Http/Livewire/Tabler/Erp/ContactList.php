<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Contact;
use App\Models\Projet;
use App\Models\ProjetContact;
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
        $c = [];
        $list  = ProjetContact::where('projet_id', $this->projet_id)->get();

        foreach ($list as $item) {
            $user = Contact::find($item->contact_id);
            array_push($c, $user);
        }

        return view('livewire.tabler.erp.contact-list',[
            'contacts' => $this->getContacts(),
            'contact_list' => $c,
        ]);
    }

    // Contact

    public function getContacts()
    {
        if ($this->search) {
            return Contact::where('firstname', 'LIKE', "%{$this->search}%")
            ->orWhere('lastname', 'LIKE', "%{$this->search}%")
            ->paginate(10);
        } else {
            return Contact::paginate(10);
        }
    }

    public function resetSearch()
    {
        $this->reset('search');
        $this->getContacts();
    }

    public function add_contact($id)
    {
        ProjetContact::create([
            'projet_id' => $this->projet_id,
            'contact_id' => $id,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete_contact()
    {
        $contact = ProjetContact::find($this->contact_id);

        $contact->delete();
        $this->render();
    }
}
