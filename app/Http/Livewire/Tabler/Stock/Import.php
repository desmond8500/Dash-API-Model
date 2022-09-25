<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Http\Controllers\ScrapperController;
use App\Models\Article;
use Livewire\Component;

class Import extends Component
{
    public $lien;
    public $fre;
    protected $article;

    public function render()
    {
        return view('livewire.tabler.stock.import',[
            'test' => $this->scrapper()
        ])->extends('app.layout')->section('content');
    }

    public function scrapper()
    {
        $data = null;

        if ($this->lien) {
            $data = ScrapperController::orbita($this->lien);
            $this->article = $data;
        }

        if ($data) {

            Article::create([
                'name' => $data->title ,
                'reference' => $data->reference ,
                'description' => $data->description ,
                'price' => $data->price
            ]);

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
                'url'           => "url",
                'title'         => "title",
                'site_name'     => "site_name",
                'description'   => "description",
                'image'         => "image",
                'price'         => "price",
                'devise'        => "devise",
                'marque'        => "marque",
                'reference'     => "reference",
                'prix'          => "prix",
            ];
        }
    }

}
