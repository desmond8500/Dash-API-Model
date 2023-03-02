<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Models\Achat;
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

    public $achat, $achat_id, $name, $date, $description, $tva=0;

    public function addAchat()
    {
        $tva=0;

        if ($this->tva) {
            $tva = 0.18;
        }

        $achat = Achat::create([
            'name' => $this->name,
            'date' => $this->date,
            'date' => $tva,
            'description' => $this->description,
        ]);

    }
    public function editAchat($achat_id)
    {
        $achat = Achat::find($achat_id);
        $this->achat_id = $achat_id;

        $this->name = $achat->name;
        $this->date = $achat->date;
        $this->tva = $achat->tva;
        $this->description = $achat->description;
    }
    public function updateAchat()
    {
        $tva = 0;
        $achat = Achat::find($this->achat_id);

        if ($this->tva) {
            $tva = 0.18;
        }

        $achat->name = $this->name;
        $achat->date = $this->date;
        $achat->tva = $tva;
        $achat->description = $this->description;
        $achat->save();
        $this->reset('achat_id');
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
