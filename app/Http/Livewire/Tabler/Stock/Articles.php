<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $count = 0;

    public function render()
    {
        return view('livewire.tabler.stock.articles', [
            "articles" => Article::paginate(12)
        ])->extends('app.layout')->section('content');
    }

    public function add()
    {
        $this->count++;
    }
}
