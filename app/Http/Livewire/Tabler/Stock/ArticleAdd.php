<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Http\Controllers\MainController;
use App\Models\Article;
use App\Models\Brand;
use Livewire\Component;

class ArticleAdd extends Component
{
    public $designation, $description, $status_id=1, $priority_id=1,
    $reference, $quantity=0, $price=0, $brand_id;

    public function render()
    {
        return view('livewire.tabler.stock.article-add',[
            'priorite' => MainController::getArticlePriotity(),
            'marques' => Brand::all()
        ]);
    }

    public function articleAdd()
    {
        Article::firstOrCreate([
            'designation' => $this->designation,
            'description' => $this->description,
            'priority_id' => $this->priority_id,
            'reference' => $this->reference,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'brand_id' => $this->brand_id,
        ]);
        $this->emit('reload');
    }
}
