<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Models\Article;
use Livewire\Component;

class Articles extends Component
{
    public function render()
    {
        return view('livewire.tabler.stock.articles',[
            'articles' => Article::all()
        ])->extends('app.layout')->section('content');
    }
}
