<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Article;
use App\Models\Invoice;
use App\Models\InvoiceRow;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Devis extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reload'=> 'render'];


    public $devis;
    public $breadcrumbs, $search = '', $article_id = 0, $article_form = 0;

    public function mount($devis_id)
    {
        $this->devis = Invoice::find($devis_id);

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            array('name' => $this->devis->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->devis->projet->client->id])),
            array('name' => $this->devis->projet->name, 'route' => route('tabler.projet', ['projet_id' => $this->devis->projet->id])),
            array('name' => 'Devis', 'route' => null),
        );
    }

    public function render()
    {
        $total =0;
        foreach ($this->devis->champs as $key => $champ) {
            $total += $champ->price*$champ->coef*$champ->quantity;
        }

        return view('livewire.tabler.erp.devis',[
            'devislist' => $this->devis,
            'champs' => $this->devis->champs,
            'articles' => $this->getArticles(),
            'total' => $total,
        ])->extends('app.layout')->section('content');;
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

    public function addArticle($article_id = null)
    {
        if ($article_id) {
            $article = Article::find($article_id);
            InvoiceRow::create([
                'invoice_id' => $this->devis->id,
                'article_id' => $article_id,
                'name' => $article->designation,
                'reference' => $article->reference,
                'price' => $article->price ?? 0,
                'quantity' => 0,
                'section_id' => 0,
            ]);
            $this->render();
        } else {
            # code...
        }
    }

    public $row_id, $name, $reference, $price, $description, $quantity, $coef;

    public function editRow($row_id)
    {
        $this->article_form = 2;
        $row = InvoiceRow::find($row_id);
        $this->row_id = $row_id;

        $this->name = $row->name;
        $this->reference = $row->reference;
        $this->price = $row->price;
        $this->quantity = $row->quantity;
        $this->coef = $row->coef;
        // $this->description = $row->description;
    }
    public function updateRow()
    {
        $row = InvoiceRow::find($this->row_id);

        $row->name = $this->name;
        $row->reference = $this->reference;
        $row->price = $this->price;
        $row->quantity = $this->quantity;
        $row->coef = $this->coef;
        // $row->description = $this->description;
        $row->save();
        $this->reset('article_form', 'row_id');
        $this->render();
    }

    public function deleteRow()
    {
        $row = InvoiceRow::find($this->row_id);
        $row->delete();
    }
}
