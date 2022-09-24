<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Http\Controllers\StockController;
use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $form = 0;

    public $name, $reference, $priority;
    public $description, $quantity, $price;
    public $brand_id, $provider_id, $storage_id;


    public function render()
    {
        return view('livewire.tabler.stock.articles', [
            "articles" => Article::paginate(12),
            "stock" => new StockController(),
        ])->extends('app.layout')->section('content');
    }

    public function add()
    {
        $this->count++;
    }
}
