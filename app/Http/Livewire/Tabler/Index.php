<?php

namespace App\Http\Livewire\Tabler;

use App\Http\Controllers\ScrapperController;
use App\Models\User;
use Livewire\Component;
use Goutte\Client;

class Index extends Component
{
    public $lien;

    public function render()
    {
        return view('livewire.tabler.index',[
            'users' => User::all(),
            'test' => $this->scrapper(),
        ])->extends('app.layout')->section('content');
    }

    public function scrapper()
    {
        $data = null;

        if ($this->lien) {
            $data = ScrapperController::orbita($this->lien);
        }

        if ($data) {
            return (object) [
                'url'           => $data->url,
                'title'         => $data->title,
                'site_name'     => $data->site_name,
                'description'   => $data->description,
                'image'         => $data->image,
                'price'         => $data->price,
                'devise'        => $data->devise,
                'marque'        => $data->marque,
                'reference'     => $data->reference,
                'prix'          => $data->prix,
            ];
        } else {
            return (object) [
                'url'           => 0,
                'title'         => "ret",
                'site_name'     => "ret",
                'description'   => "ret",
                'image'         => "ret",
                'price'         => "ret",
                'devise'        => "ret",
                'marque'        => "ret",
                'reference'     => "ret",
                'prix'          => "ret",
            ];
        }


    }
}
