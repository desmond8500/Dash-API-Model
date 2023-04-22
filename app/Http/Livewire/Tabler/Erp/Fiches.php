<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Fiche;
use App\Models\FicheZone;
use Livewire\Component;

class Fiches extends Component
{
    public $projet_id;
    public $fiche_type = [
        ['id' => 1, 'name' => 'Fiche Alarme Galaxy Dimension'],
        ['id' => 2, 'name' => 'Fiche Alarme Teletek'],
        ['id' => 3, 'name' => 'Fiche Incendie Inim Conventionel'],
        ['id' => 4, 'name' => 'Fiche Incendie Inim Adressable'],
        ['id' => 5, 'name' => 'Fiche Incendie Cofem Conventionel'],
        ['id' => 6, 'name' => 'Fiche Incendie Cofem Adressable'],
        ['id' => 7, 'name' => 'Fiche Incendie Aguilera Conventionel'],
        ['id' => 8, 'name' => 'Fiche Incendie Aguilera Adressable'],
        ['id' => 9, 'name' => 'Fiche Incendie Detnov Adressable'],
    ];

    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
    }
    public function render()
    {
        return view('livewire.tabler.erp.fiches',[
            'fiches' => $this->get_fiches(),
        ]);
    }

    public function select_fiche($fiche_id)
    {
        $this->selected_fiche = Fiche::find($fiche_id);
    }

    public function get_fiches()
    {
        return Fiche::where('projet_id',$this->projet_id)->get();
    }

    public function fill_password()
    {
        if ($this->type==1) {
            $this->master_code = 12345;
            $this->tech_code = 112233;
        }
    }

    // Fiche
    public $fiche_id, $selected_fiche, $fiche_type_id, $modele, $name, $type, $date, $master_code, $tech_code, $user_code;
    public $codes = false;
    protected $rules = [
        // 'projet_id' => 'required',
        'type' => 'required',
        'modele' => 'required',
    ];

    public function add_fiche()
    {
        $this->validate($this->rules);
        Fiche::create([
            'projet_id' => $this->projet_id,
            'name' => ucfirst( $this->name),
            'fiche_type_id' => $this->type,
            'date' => $this->date,
            'master_code' => $this->master_code,
            'user_code' => $this->user_code,
            'tech_code' => $this->tech_code,
            'modele' => $this->modele,
        ]);
        $this->reset("name","date",'master_code', 'modele', 'user_code', 'tech_code', "fiche_type_id");
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit_fiche()
    {
        $fiche = $this->selected_fiche;
        $this->name = $fiche->name;
        $this->master_code = $fiche->master_code;
        $this->user_code = $fiche->user_code;
        $this->tech_code = $fiche->tech_code;
        $this->modele = $fiche->modele;
        if ($fiche->date) {
            $this->date = date_format($fiche->date, 'Y-m-d');
        }
        $this->type = $fiche->fiche_type_id;
        $this->dispatchBrowserEvent('open-edit-fiche');
    }

    public function update_fiche()
    {
        $this->validate($this->rules);
        $fiche = Fiche::find($this->selected_fiche->id);
        $fiche->fiche_type_id = $this->type;
        $fiche->name = ucfirst($this->name);
        if ($this->date) {
            $fiche->date = $this->date;
        }
        $fiche->master_code = $this->master_code;
        $fiche->user_code = $this->user_code;
        $fiche->tech_code = $this->tech_code;
        $fiche->modele = $this->modele;
        $fiche->save();
        $this->reset("name","date", 'master_code', 'modele', 'user_code', 'tech_code', "fiche_type_id");
        $this->selected_fiche = $fiche;
        $this->dispatchBrowserEvent('close-modal');
    }
    public function delete_fiche()
    {
        $fiche = Fiche::find($this->fiche_id);

        $fiche->delete();
        $this->render();
    }

    // Zone
    public $fiche_zone_id, $zone, $equipement, $local;

    public $equipements = [
        [
            'id'=> 1 , 'name'=>'Détection incendie', 'list' => [
                'Détecteur optique de fumée',
                'Détecteur thermique',
                'Détecteur optico-thermique',
                'Déclencheur manuel',
            ]
        ],
        [
            'id' => 2, 'name' => 'Alarme anti intrusion', 'list' => [
                "Détecteur de mouvement",
                "Contact de porte",
                "Pédales",
                "Bouton panique",
                "Détecteur sismique",
            ]
        ]
    ];
    public $locaux = [
        [
            'id'=> 1 , 'name'=> 'Banque', 'list' => [
                'Entrée personnel',
                'Entrée clients',
                'Coffre',
                'Gab',
                'Archives',
                'Local Techique',
                'Hall',
                'Hall Client',
                'Caisse',
                'Arrière Caisse'
            ]
        ],
    ];

    protected $zone_rules = [
        'zone' => ['required','integer','gt:0'],
        'equipement' => 'required',
        'local' => 'required',
    ];

    public function edit_equipement($item)
    {
        $this->equipement = $item;
    }
    public function edit_local($item)
    {
        $this->local = $item;
    }

    public function add_fiche_zone()
    {
        $this->validate($this->zone_rules);
        FicheZone::create([
            'fiche_id' => $this->selected_fiche->id,
            'zone' => ucfirst($this->zone),
            'equipement' => $this->equipement,
            'local' => $this->local,
        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->reset('zone', 'equipement', 'local');
        $this->selected_fiche = Fiche::find($this->selected_fiche->id);
    }

    public function edit_fiche_zone($fiche_zone_id)
    {
        $this->fiche_zone_id = $fiche_zone_id;
        $fiche_zone = FicheZone::find($fiche_zone_id);
        $this->zone = $fiche_zone->zone;
        $this->equipement = $fiche_zone->equipement;
        $this->local = $fiche_zone->local;
        $this->dispatchBrowserEvent('open-edit-zone');

    }

    public function update_fiche_zone()
    {
        $this->validate($this->zone_rules);
        $fiche_zone = FicheZone::find($this->fiche_zone_id);
        $fiche_zone->zone = $this->zone;
        $fiche_zone->equipement = $this->equipement;
        $fiche_zone->local = $this->local;
        $fiche_zone->save();
        $this->reset('fiche_zone_id');
        $this->dispatchBrowserEvent('close-modal');
        $this->reset('zone', 'equipement', 'local');
        $this->selected_fiche = Fiche::find($fiche_zone->fiche_id);
    }
    public function delete_fiche_zone($fiche_zone_id)
    {
        $fiche_zone = FicheZone::find($fiche_zone_id);
        $fiche_zone->delete();
        $this->selected_fiche = Fiche::find($this->selected_fiche->id);
    }

    public function convert_equipment($row_id)
    {
        $this->fiche_zone_id = $row_id;
    }
}
