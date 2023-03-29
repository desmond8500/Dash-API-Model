<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Models\Achat as ModelsAchat;
use App\Models\AchatArticle;
use App\Models\AchatFacture;
use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Achat extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='', $breadcrumbs;
    public $achat_id, $article_id = 0, $article_form=0;
    public $designation, $description, $reference, $quantity = 0, $price = 0;
    public $date, $provider_id, $brand_id;

    public function mount($achat_id)
    {
        $this->achat_id = $achat_id;
        $this->breadcrumbs = array(
            array('name' => 'Achats', 'route' => route('tabler.achats')),
            array('name' => 'Achat', 'route' => route('tabler.achat', ['achat_id' => $this->achat_id])),
        );
    }

    public function render()
    {
        $achat = ModelsAchat::find($this->achat_id);
        $total = 0;
        foreach ($achat->articles as $key => $achat_row) {
            $total += $achat_row->quantity * $achat_row->price;
        }

        return view('livewire.tabler.stock.achat',[
            'achat' => $achat,
            'articles' => $this->getArticles(),
            'total' => $total,
            'factures' => AchatFacture::where('achat_id', $this->achat_id)->get(),
        ])->extends('app.layout')->section('content');
    }

    public function getArticles()
    {
        if ($this->search) {
            return Article::where('designation', 'LIKE', "%{$this->search}%")
            ->orWhere('reference', 'LIKE', "%{$this->search}%")
            ->paginate(7);
        } else {
            return Article::paginate(7);
        }
    }

    public function resetSearch()
    {
        $this->reset('search');
        $this->getArticles();
    }

    public function addArticle($article_id=null)
    {
        if ($article_id) {
            $article = Article::find($article_id);
            AchatArticle::create([
                'achat_id' => $this->achat_id,
                'article_id' => $article_id,
                'quantity' => 0,
                // 'date' => $this->date,
                'provider_id' => $article->provider_id,
                'brand_id' => $article->brand_id,
                'designation' => $article->designation,
                'reference' => $article->reference,
                'description' => $article->description,
            ]);
        } else {
            # code...
        }
    }
    public $achat_row_id=0;
    public function editAchatRow($achat_row_id)
    {
        $this->article_form = 2;
        $this->achat_row_id = $achat_row_id;
        $achat = AchatArticle::find($achat_row_id);

        $this->designation = $achat->designation;
        $this->article_id = $achat->article_id;
        $this->quantity = $achat->quantity;
        $this->price = $achat->price;
        $this->reference = $achat->reference;
        $this->description = $achat->description;
        if ($achat->date) {
            $this->date = date_format($achat->date, 'Y-m-d');
        }
        $this->provider_id = $achat->provider_id;
        $this->brand_id = $achat->brand_id;
    }

    public function updateAchatRow()
    {
        $achat = AchatArticle::find($this->achat_row_id);

        $achat->designation = $this->designation;
        $achat->article_id = $this->article_id;
        $achat->quantity = $this->quantity;
        $achat->price = $this->price;
        $achat->reference = $this->reference;
        $achat->description = $this->description;
        $achat->date = $this->date;
        $achat->provider_id = $this->provider_id;
        $achat->brand_id = $this->brand_id;
        $achat->save();

        $this->reset('article_form');
    }

    public function deleteAchatRow($achat_row_id)
    {
        $achat_row = AchatArticle::find($achat_row_id);

        $achat_row->delete();
    }

    public $bills;
    public function add_bill()
    {
        if ($this->bills) {
            $dir = "stock/achats/$this->achat_id";

            foreach ($this->bills as $key => $bill) {
                $name = $bill->getClientOriginalName();
                $bill->storeAS("public/$dir", $name);

                $img = AchatFacture::firstOrCreate([
                    'achat_id' => $this->achat_id,
                    'name' => $name,
                    'folder' => "storage/$dir/$name",
                ]);
            }
        }
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteBill($bill_id)
    {
        $bill = AchatFacture::find($bill_id);
        unset($bill->folder);

        $bill->delete();

    }
}
