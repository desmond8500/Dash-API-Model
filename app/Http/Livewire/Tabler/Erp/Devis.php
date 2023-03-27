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

    public $devis, $edit;
    public $breadcrumbs, $search = '', $article_id = 0, $article_form = 0;

    protected $rules = [
        'name' => 'required',
        'reference' => 'required',
        'price' => 'numeric',
        'quantity' => 'integer',
    ];

    protected $validationAttributes = [
        'name' => 'required',
        'reference' => 'required',
        'price' => 'numeric',
        'quantity' => 'integer',
    ];

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

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $total =0;
        foreach ($this->devis->champs as $key => $champ) {
            $total += $champ->price*$champ->coef*$champ->quantity;
        }

        return view('livewire.tabler.erp.devis',[
            'devislist' => $this->devis,
            'champs' => InvoiceRow::where('invoice_id', $this->devis->id)->get(),
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
            $this->validate($this->rules);

            InvoiceRow::create([
                'invoice_id' => $this->devis->id,
                'article_id' => 0,
                'name' => $this->name,
                'reference' => $this->reference,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'section_id' => 0,
            ]);
            $this->render();
            $this->dispatchBrowserEvent('close-modal');
            $this->render();
        }
    }

    public $row_id, $name, $reference, $price=0, $description, $quantity=0, $coef=1;

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

        $this->edit = $row_id;
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
        $this->render();
    }

    // Devis
    public $devis_edit=false, $projet_id, $status = 1;
    public $client_name, $client_tel, $client_address;
    public $discount = 0, $tva = 0, $brs = 0;

    protected $devis_rules = [
        'description' => 'required',
        'tva' => 'numeric',
        'brs' => 'numeric',
        'discount' => 'numeric',
        'client_tel' => 'numeric',
    ];

    public function edit_invoice()
    {
        $this->devis_edit = true;
        $this->projet_id     = $this->devis->projet_id;
        $this->reference     = $this->devis->reference;
        $this->status        = $this->devis->status;
        $this->description   = $this->devis->description;
        $this->client_name   = $this->devis->client_name;
        $this->client_tel    = $this->devis->client_tel;
        $this->client_address = $this->devis->client_address;
        $this->discount      = $this->devis->discount;
        $this->tva           = $this->devis->tva;
        $this->brs           = $this->devis->brs;
    }

    public function update_invoice()
    {
        $this->validate($this->devis_rules);
        $devis = Invoice::find($this->devis_id);

        // $devis->projet_id = $this->projet_id;
        $devis->reference = $this->reference;
        $devis->status = $this->status;
        $devis->description = $this->description;
        $devis->client_name = $this->client_name;
        $devis->client_tel = $this->client_tel;
        $devis->client_address = $this->client_address;
        $devis->discount = $this->discount;
        $devis->tva = $this->tva;
        $devis->brs = $this->brs;

        $devis->save();
        $this->devis_edit = false;
    }


}
