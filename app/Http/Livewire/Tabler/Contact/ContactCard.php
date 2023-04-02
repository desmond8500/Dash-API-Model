<?php

namespace App\Http\Livewire\Tabler\Contact;

use App\Models\Contact;
use App\Models\ContactMail;
use App\Models\ContactTel;
use Livewire\Component;

class ContactCard extends Component
{
    public $contact;
    public $contact_id, $firstname, $lastname, $description, $avatar;
    public $tel, $email;

    public function mount($contact)
    {
        $this->contact = $contact;
    }

    public function render()
    {
        return view('livewire.tabler.contact.contact-card');
    }

    // Contact

    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'description' => 'required',
    ];
    protected $tel_rules = [
        'tel' => ['required'],
    ];
    protected $email_rules = [
        'email' => ['required', 'email'],
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

        if ($this->tel) {
            $this->validate($this->tel_rules);
            ContactTel::firstOrCreate([
                'contact_id' => $contact->id,
                'tel' => $this->tel,
            ]);
        }

        if ($this->email) {
            $this->validate($this->email_rules);
            ContactMail::firstOrCreate([
                'contact_id' => $contact->id,
                'email' => $this->email,
            ]);
        }

        $this->reset('contact_id', 'firstname', 'lastname', 'description', 'email', 'tel');

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

        if ($this->tel) {
            $this->validate($this->tel_rules);
            ContactTel::firstOrCreate([
                'contact_id' => $contact->id,
                'tel' => $this->tel,
            ]);
        }

        if ($this->email) {
            $this->validate($this->email_rules);
            ContactMail::firstOrCreate([
                'contact_id' => $contact->id,
                'email' => $this->email,
            ]);
        }

        $this->reset('contact_id', 'firstname', 'lastname', 'description', 'email', 'tel');
        $this->emit('reload');
        $this->render();
    }

    public function delete_contact()
    {
        $contact = Contact::find($this->contact_id);

        foreach ($contact->tels as $tel) {
            $tel->delete();
        }
        foreach ($contact->emails as $email) {
            $email->delete();
        }

        $contact->delete();
        $this->render();
    }

    public function delete_tel($tel_id)
    {
        $tel = ContactTel::find($tel_id);
        $tel->delete();
    }

    public function delete_email($email_id)
    {
        $email = ContactMail::find($email_id);
        $email->delete();
    }
}
