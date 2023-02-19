<?php

namespace App\Http\Livewire\Tabler\File;

use App\Models\Fichier;
use FontLib\Table\Type\name;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Files extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='', $breadcrumbs, $form=false, $file;
    public $name;
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

    public function resetSearch()
    {
        $this->reset('search') ;
        $this->searchFile();
    }

    public function editFile($file_id)
    {
        $this->file = Fichier::find($file_id);
        $this->name = $this->file->name;
    }
    public function updateFile()
    {
        $this->file->name = $this->name;
        $this->file->save();

    }
    public function deleteFile()
    {
        $this->file->delete();
    }
}
