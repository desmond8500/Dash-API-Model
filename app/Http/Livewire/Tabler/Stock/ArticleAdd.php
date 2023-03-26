<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Http\Controllers\MainController;
use App\Models\Article;
use App\Models\ArticleDoc;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticleAdd extends Component
{
    use WithFileUploads;

    public $designation, $description, $status_id=1, $priority_id=1,
    $reference, $quantity=0, $price=0, $brand_id, $photos;

    public function render()
    {
        return view('livewire.tabler.stock.article-add',[
            'priorite' => MainController::getArticlePriotity(),
            'marques' => Brand::all()
        ]);
    }

    protected $rules = [
        'designation' => 'required',
        'reference' => 'required',
        'price'=> 'numeric'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function articleAdd()
    {
        $this->validate($this->rules);

        $article = Article::firstOrCreate([
            'designation' => ucfirst($this->designation),
            'description' => ucfirst($this->description),
            'priority' => $this->priority_id,
            'reference' => $this->reference,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'brand_id' => $this->brand_id,
        ]);

        $dir = "stock/articles/$article->id/";

        if ($this->photos) {
            // Storage::disk('public')->deleteDirectory($dir);
            foreach ($this->photos as $key => $photo) {
                $name = $photo->getClientOriginalName();
                $photo->storeAS("public/$dir", $name);

                $img = ArticleDoc::firstOrCreate([
                    'article_id' => $article->id,
                    'name' => $name,
                    'folder' => "storage/$dir/$name",
                    'doc_type' => 'image'
                ]);
                if ($key == 0) {
                    $article->image = $img->folder;
                    $article->save();
                }
            }
        }
        $this->emit('reload');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function uppercase_reference()
    {
        $this->reference = strtoupper($this->reference);
    }

    public function convert($currency)
    {
        if ($currency == 'euro') {
            $this->price = $this->price*655;
        } elseif($currency=='dollar') {
            $this->price = $this->price*613;
        }
    }
}
