<?php

namespace App\Http\Livewire\Tabler\Pages;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Docs extends Component
{
    public $fichier = "0";

    public function mount($fichier = null)
    {
        $this->fichier = $fichier;
    }

    public function render()
    {
        return view('livewire.tabler.pages.docs',[
            'files' => $this->files(),
            'contenu' => $this->getContent()
        ])->extends('app.layout')->section('content');
    }

    public function files()
    {
        return  Storage::disk('documents')->files('.');
    }

    public function getContent()
    {
        if ($this->fichier != null) {
            $contenu = file_get_contents("documents/$this->fichier");
            return  $contenu;
        }
        return $this->fichier;
    }
}
