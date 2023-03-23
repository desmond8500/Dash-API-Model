<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Models\Provider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Providers extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reload'=> 'render'];
    public $breadcrumbs;

    public function updatingSearch() {
        $this->resetPage();
    }
    public $name, $description, $logo, $provider_id;
    public $search ='';
    protected $rules = [
        'name' => 'required'
    ];

    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Stock', 'route' => route('tabler.stock')),
            array('name' => 'Fournisseurs', 'route' => route('tabler.providers')),

        );
    }
    public function render()
    {
        return view('livewire.tabler.stock.providers',[
            'providers' => Provider::all()
        ])->extends('app.layout')->section('content');
    }

    public function add_provider()
    {
        $this->validate($this->rules);
        Provider::firstOrCreate([
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit_provider($id)
    {
        $this->provider_id = $id;
        $provider = Provider::find($id);

        $this->name = $provider->name;
        $this->description = $provider->description;
        $this->logo = $provider->logo;
    }

    public function update_provider()
    {
        $this->provider_id = $this->provider_id;
        $provider = Provider::find($this->provider_id);

        $provider->name = $this->name;
        $provider->description = $this->description;
        $provider->logo = $this->logo;
        $provider->save();
        $this->reset('provider_id');
    }
    public function delete_provider()
    {
        $provider = Provider::find($this->provider_id);

        $provider->delete();
        $this->reset('provider_id');
    }
}
