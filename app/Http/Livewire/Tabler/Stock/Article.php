<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Http\Controllers\MainController;
use App\Models\Article as ModelsArticle;
use App\Models\ArticleDoc;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Article extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reload'=> 'render'];

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='';
    public $article, $breadcrumbs, $form=0, $docform=false, $files;
    public $article_id, $photos;
    public $designation, $description, $status_id = 1, $priority = 1, $reference, $quantity = 0, $price = 0, $brand_id;
    public $name, $folder, $doc_type=1;

    public function mount($article_id)
    {
        $this->article = ModelsArticle::find($article_id);
        $this->breadcrumbs = array(
            array('name' => 'Articles', 'route' => route('tabler.articles')),
            array('name' => 'Article', 'route' => route('tabler.article',['article_id'=>$article_id])),
        );
    }
    public function render()
    {
        return view('livewire.tabler.stock.article',[
            'article' => $this->article,
            'priorite' => MainController::getArticlePriotity(),
            'marques' => Brand::all(),
            'fichiers' => ArticleDoc::where('article_id', $this->article_id)->where('doc_type','!=',0)->get() ,
            'doctype' => MainController::getDocType(),
        ])->extends('app.layout')->section('content');
    }

    public function editArticle($article_id)
    {
        $this->form = 2;
        $article = ModelsArticle::find($this->article_id);

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
        $article = ModelsArticle::find($this->article_id);
        $article->designation = $this->designation;
        $article->description = $this->description;
        $article->priority = $this->priority;
        $article->reference = $this->reference;
        $article->quantity = $this->quantity;
        $article->price = $this->price;
        $article->brand_id = $this->brand_id;

        $article->save();
        $this->article =$article;
        $this->form = 0;

        if ($this->photos) {
            $dir = "stock/articles/$article->id/";
            foreach ($this->photos as $key => $photo) {
                $name = $photo->getClientOriginalName();
                $photo->storeAS("public/$dir", $name);

                ArticleDoc::firstOrCreate([
                    'article_id' => $article->id,
                    'name' => $name,
                    'folder' => "storage/$dir/$name",
                    'doc_type' => 0
                ]);
            }
        }
    }

    public function Ajouter()
    {
        $dir = "stock/articles";
        if ($this->files) {
            foreach ($this->files as $key => $file) {
                $name = $file->getClientOriginalName();
                $file->storeAS("public/$dir/$this->article_id/docs", $name);

                $fichier = ArticleDoc::firstOrCreate([
                    'article_id' => $this->article_id,
                    'name' => $this->name ?? $name,
                    'folder' => "storage/$dir/$this->article_id/docs/$name",
                    'doc_type' => $this->doc_type
                ]);


                // $path = pathinfo($fichier->folder);
                // if ($path['extension'] == 'pdf') {
                //     $fichier->type = 'pdf';
                // } elseif ($path['extension'] == 'png' || $path['extension'] == 'jpg' || $path['extension'] == 'jepg' || $path['extension'] == 'webm') {
                //     $fichier->type = 'image';
                // } elseif ($path['extension'] == 'xls' || $path['extension'] == 'xlsx' || $path['extension'] == 'csv') {
                //     $fichier->type = 'excel';
                // } elseif ($path['extension'] == 'doc' || $path['extension'] == 'docx') {
                //     $fichier->type = 'word';
                // }
                // $fichier->save();
            }
        }
        $this->docform = false;
    }

    public function setImage($image){
        $this->article->image = $image;
        $this->article->save();
    }

    public function deleteImage($id){
        $fichier = ArticleDoc::find($id);

        unlink($fichier->folder);
        $fichier->delete();
        $this->render();

    }

    // public $first = ModelsArticle::first();


    public function next(){
        $article = null;
        do {
           $article = ModelsArticle::find($this->article_id+1);
        } while (!$article);
        return redirect()->route('tabler.article',['article_id'=>$article->id]);
    }
    public function previous(){
        $article = null;
        do {
            $article = ModelsArticle::find($this->article_id - 1);
        } while (!$article);
        return redirect()->route('tabler.article',['article_id'=>$this->article_id-1]);
    }
}
