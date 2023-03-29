<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Models\Achat;
use App\Models\AchatFacture;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Achats extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reload'=> 'render'];

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='', $breadcrumbs;

    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Achats', 'route' => route('tabler.achats')),
        );
    }

    public function render()
    {
        return view('livewire.tabler.stock.achats',[
            'achats' => Achat::all(),
        ])->extends('app.layout')->section('content');
    }

    public $achat, $achat_id, $name, $date, $description, $tva=0, $factures, $tva_check=false;

    protected $rules = [
        'name' => ['required'],
        'date' => ['required', 'date'],
    ];

    public function addAchat()
    {
        if ($this->tva_check) {
            $tva = 0.18;
        }else{
            $tva = 0;
        }

        $achat = Achat::create([
            'name' => $this->name,
            'date' => $this->date,
            'date' => $tva,
            'description' => $this->description,
        ]);

        if ($this->factures) {
            $dir = "stock/achats/$achat->id";

            foreach ($this->factures as $key => $facture) {
                $name = $facture->getClientOriginalName();
                $facture->storeAS("public/$dir", $name);

                $img = AchatFacture::firstOrCreate([
                    'achat_id' => $achat->id,
                    'name' => $name,
                    'folder' => "storage/$dir/$name",
                ]);
            }
        }
    }
    public function editAchat($achat_id)
    {
        $achat = Achat::find($achat_id);
        $this->achat_id = $achat_id;

        $this->name = $achat->name;
        $this->date = date_format($achat->date, 'Y-m-d');
        $this->tva = $achat->tva;
        $this->description = $achat->description;
    }
    public function updateAchat()
    {
        $tva = 0;
        $achat = Achat::find($this->achat_id);

        if ($this->tva_check) {
            $tva = 0.18;
        } else {
            $tva = 0;
        }

        $achat->name = $this->name;
        $achat->date = $this->date;
        $achat->tva = $tva;
        $achat->description = $this->description;
        $achat->save();
        $this->reset('achat_id');

        if ($this->factures) {
            $dir = "stock/achats/$achat->id";

            foreach ($this->factures as $key => $facture) {
                $name = $facture->getClientOriginalName();
                $facture->storeAS("public/$dir", $name);

                $img = AchatFacture::firstOrCreate([
                    'achat_id' => $achat->id,
                    'name' => $name,
                    'folder' => "storage/$dir/$name",
                ]);
            }
        }
    }
    public function deleteAchat()
    {
        $achat = Achat::find($this->achat_id);

        if ($achat->articles->count()) {
            # code...
        }else{
            $achat->delete();
            $this->reset('achat_id');
        }
    }
}
