<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Brands extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='';
    public $breadcrumbs;
    protected $listeners = ['reload'=> 'render'];

    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Achats', 'route' => route('tabler.achats')),
        );
    }

    public function render()
    {
        return view('livewire.tabler.stock.brands',[
            'brands' => Brand::all(),
        ])->extends('app.layout')->section('content');
    }

}
