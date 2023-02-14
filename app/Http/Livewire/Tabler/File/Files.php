<?php

namespace App\Http\Livewire\Tabler\File;

use App\Models\Fichier;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Files extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    // protected $listeners = ['reload'=> 'render'];

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='', $breadcrumbs, $form=false;
    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Fichiers', 'route' => route('tabler.files')),
        );
    }
    public function render()
    {
        return view('livewire.tabler.file.files',[
            'fichiers' => $this->searchFile(),
        ])->extends('app.layout')->section('content');
    }

    public function searchFile()
    {
        if ($this->search) {
            return Fichier::where('name', 'LIKE', "%{$this->search}%")->get();
        } else {
            return Fichier::all();
        }

    }
}
