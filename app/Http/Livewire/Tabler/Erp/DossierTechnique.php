<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Fichier;
use App\Models\Projet;
use App\Models\ProjetFile;
use App\Models\System;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class DossierTechnique extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $projet_id, $form=false, $system_id;
    public $search = '', $breadcrumbs, $files;
    public $name, $description;

    protected $system_rules = [
        'name' => 'required',
    'description' => 'required',
    ];

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
    }
    public function render()
    {
        return view('livewire.tabler.erp.dossier-technique',[
            'projet' => Projet::find($this->projet_id),
            'systems' => System::where('projet_id', $this->projet_id)->get()
        ]);
    }

    public function Ajouter()
    {
        if ($this->files) {
            $id = Fichier::count();
            $dir = "files/";
            foreach ($this->files as $key => $file) {
                $id++;
                $name = $file->getClientOriginalName();
                $file->storeAS("public/$dir/$id", $name);

                $fichier = Fichier::firstOrCreate([
                    'name' => $name,
                    'folder' => "storage/$dir/$id/$name",
                    'type' => 'image'
                ]);
                ProjetFile::firstOrCreate([
                    'projet_id' => $this->projet_id,
                    'fichier_id' => $fichier->id,
                ]);

                $path = pathinfo($fichier->folder);
                if ($path['extension'] == 'pdf') {
                    $fichier->type = 'pdf';
                } elseif ($path['extension'] == 'png' || $path['extension'] == 'jpg' || $path['extension'] == 'jepg' || $path['extension'] == 'webm') {
                    $fichier->type = 'image';
                } elseif ($path['extension'] == 'xls' || $path['extension'] == 'xlsx' || $path['extension'] == 'csv') {
                    $fichier->type = 'excel';
                } elseif ($path['extension'] == 'doc' || $path['extension'] == 'docx') {
                    $fichier->type = 'word';
                }
                $fichier->save();
            }
        }
        $this->form = false;
    }

    public function edit_system($system_id)
    {
        $this->system_id = $system_id;
        $system = System::find($system_id);

        $this->name = $system->name;
        $this->description = $system->description;
    }

    public function update_system()
    {
        $this->validate($this->system_rules);

        $system = System::find($this->system_id);

        $system->name = $this->name;
        $system->description = $this->description;
        $system->save();
        $this->reset('system_id');

    }


}
