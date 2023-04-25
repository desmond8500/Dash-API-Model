<?php

namespace App\Http\Livewire\Tabler\Config;

use App\Models\Entreprise as ModelsEntreprise;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Entreprise extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.tabler.config.entreprise',[
            'entreprise' => ModelsEntreprise::first(),
        ]);
    }

    // Entreprise
    public $entreprise_id, $name, $logo, $ninea, $adress, $mail, $rccm, $site, $banque;
    public $edit = false;
    protected $rules = [
        'name' => 'required',
        'mail' => 'email',
        'site' => 'url',
    ];

    public function add_entreprise()
    {
        $this->validate($this->rules);
        ModelsEntreprise::create([
            'name' => ucfirst($this->name),
            'logo' => $this->logo,
            'ninea' => $this->ninea,
            'adress' => $this->adress,
            'mail' => $this->mail,
            'rccm' => $this->rccm,
            'site' => $this->site,
            'banque' => $this->banque,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit_entreprise()
    {
        $this->edit = true;
        $entreprise = ModelsEntreprise::find(1);
        $this->name = $entreprise->name;
        $this->ninea = $entreprise->ninea;
        $this->adress = $entreprise->adress;
        $this->mail = $entreprise->mail;
        $this->rccm = $entreprise->rccm;
        $this->site = $entreprise->site;
        $this->banque = $entreprise->banque;
    }

    public function update_entreprise()
    {
        $this->validate($this->rules);
        $entreprise = ModelsEntreprise::find(1);
        $entreprise->name = $this->name;
        // $entreprise->logo = $this->logo;
        $entreprise->ninea = $this->ninea;

        $entreprise->adress = $this->adress;
        $entreprise->mail = $this->mail;
        $entreprise->rccm = $this->rccm;
        $entreprise->site = $this->site;
        $entreprise->banque = $this->banque;

$dir = "config/entreprise/$entreprise->id/logo";

if ($this->logo) {
    Storage::disk('public')->deleteDirectory($dir);
    $name = $this->logo->getClientOriginalName();
    $this->logo->storeAS("public/$dir", $name);
    $entreprise->logo = "storage/$dir/$name";
}

        $entreprise->save();
        $this->reset('entreprise_id', 'edit');
        $this->render();
    }
    public function delete_entreprise()
    {
        $entreprise = ModelsEntreprise::find($this->entreprise_id);

        $entreprise->delete();
        $this->render();
    }
}
