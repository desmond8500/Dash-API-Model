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
}
