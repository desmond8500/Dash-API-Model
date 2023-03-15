<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Exports\ArticlesExport;
use App\Http\Controllers\MainController;
use App\Imports\ArticleImport;
use App\Models\Article;
use App\Models\ArticleDoc;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Articles extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reload'=> 'render'];
    public $img = 'img/no-pictures.png';

    public function updatingSearch() {
        $this->resetPage();
    }

    public $article_id, $photos, $file, $article_list;
    public $designation, $description, $status_id = 1, $priority = 1, $reference, $quantity = 0, $price = 0, $brand_id;
    public $search ='', $breadcrumbs;
    public $form = false, $editForm=false;
    public $json;

    public function mount()
    {
        $this->breadcrumbs = array(
            array('name' => 'Articles', 'route' => route('tabler.articles')),
        );
    }

    public function render()
    {
        return view('livewire.tabler.stock.articles',[
            'articles' => $this->getArticles(),
            'priorite' => MainController::getArticlePriotity(),
            'marques' => Brand::all(),
            'list' => $this->getFileList(),
            'img' => $this->img,
        ])->extends('app.layout')->section('content');
    }

    public function getArticles()
    {
        if ($this->search) {
            return Article::where('designation', 'LIKE', "%{$this->search}%")
                ->orWhere('reference', 'LIKE', "%{$this->search}%")
                ->paginate(10);
        } else {
            return Article::orderBy('id', 'DESC')-> paginate(10);
        }
    }

    public function resetSearch()
    {
        $this->reset('search') ;
        $this->getArticles();
    }

    public function articleAdd()
    {
        $article = Article::firstOrCreate([
            'designation' => $this->designation,
            'description' => $this->description,
            'priority' => $this->priority,
            'reference' => $this->reference,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'brand_id' => $this->brand_id,
        ]);

        $dir = "stock/articles/$article->id/";

        if ($this->photos) {
            Storage::disk('public')->deleteDirectory($dir);
            foreach ($this->photos as $key => $photo) {
                $name = $photo->getClientOriginalName();
                $photo->storeAS("public/$dir", $name);

                $img = ArticleDoc::firstOrCreate([
                    'article_id' => $article->id,
                    'name' => $name,
                    'folder'=> "storage/$dir/$name",
                    'doc_type'=> 'image'
                ]);
                if ($key==0) {
                    $article->image = $img->folder;
                    $article->save();
                }
            }
        }
        $this->form = 0;
        $this->article_id = 0;
    }

    public function editArticle($article_id)
    {
        $this->form = 2;
        $article = Article::find($article_id);
        $this->article_id = $article_id;

        $this->designation = $article->designation;
        $this->description = $article->description;
        $this->priority = $article->priority;
        $this->reference = $article->reference;
        $this->quantity = $article->quantity;
        $this->price = $article->price;
        $this->brand_id = $article->brand_id;
    }

    public function updateArticle()
    {
        $article = Article::find($this->article_id);
        $article->designation = $this->designation;
        $article->description = $this->description;
        $article->priority = $this->priority;
        $article->reference = $this->reference;
        $article->quantity = $this->quantity;
        $article->price = $this->price;
        $article->brand_id = $this->brand_id;

        $article->save();
        $this->form = 0;
        $this->article_id = 0;

        if ($this->photos) {
            $dir = "stock/articles/$article->id/";
            foreach ($this->photos as $key => $photo) {
                $name = $photo->getClientOriginalName();
                $photo->storeAS("public/$dir", $name);

                ArticleDoc::firstOrCreate([
                    'article_id' => $article->id,
                    'name' => $name,
                    'folder' => "storage/$dir/$name",
                    'doc_type' => 'image'
                ]);
            }
        }
    }

    public function gotoArticle($article_id)
    {
        return redirect()->route('tabler.article',[$article_id]);
    }

    public function import()
    {
        $dir = "stock/imports/";
        $name = $this->file->getClientOriginalName();
        $this->file->storeAS("public/$dir", $name);

        $this->reset('form');

    }

    public function exportArticles()
    {
        return Excel::download(new ArticlesExport, 'Articles.xlsx');
    }

    public function deleteArticle()
    {
        $article = Article::find($this->article_id);
        $article->delete();
        $this->form = 0;
    }

    public function getFileList()
    {
        return Storage::disk('public')->files('stock/imports');
    }

    public function use($item)
    {
        Excel::import(new ArticleImport, $item);

    }
    public function delete($item)
    {
        return Storage::disk('public')->delete($item);

    }


}
