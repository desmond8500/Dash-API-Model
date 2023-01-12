<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Client;
use Livewire\Component;

class Clients extends Component
{
    public $breadcrumbs;

    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients'),),
        );
    }

    public function render()
    {
        return view('livewire.tabler.erp.clients',[
            'breadcrumbs' => $this->breadcrumbs,
            'clients' => Client:: all()
        ])->extends('app.layout')->section('content');
    }


}
