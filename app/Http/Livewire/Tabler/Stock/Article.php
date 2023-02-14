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
    public $article, $breadcrumbs, $form=0, $docform=false;
    public $article_id, $photos;
    public $designation, $description, $status_id = 1, $priority = 1, $reference, $quantity = 0, $price = 0, $brand_id;
    public $name, $folder, $doc_type;

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
            'docs' => ModelsArticle::where('article_id', $this->article_id),
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
                    'doc_type' => 'image'
                ]);
            }
        }
    }

    // public function Ajouter()
    // {
    //     if ($this->files) {
    //         $id = Fichier::count();
    //         $dir = "files/";
    //         foreach ($this->files as $key => $file) {
    //             $id++;
    //             $name = $file->getClientOriginalName();
    //             $file->storeAS("public/$dir/$id", $name);

    //             $fichier = Fichier::firstOrCreate([
    //                 'name' => $name,
    //                 'folder' => "storage/$dir/$id/$name",
    //                 'type' => 'image'
    //             ]);
    //             ProjetFile::firstOrCreate([
    //                 'projet_id' => $this->projet_id,
    //                 'fichier_id' => $fichier->id,
    //             ]);

    //             $path = pathinfo($fichier->folder);
    //             if ($path['extension'] == 'pdf') {
    //                 $fichier->type = 'pdf';
    //             } elseif ($path['extension'] == 'png' || $path['extension'] == 'jpg' || $path['extension'] == 'jepg' || $path['extension'] == 'webm') {
    //                 $fichier->type = 'image';
    //             } elseif ($path['extension'] == 'xls' || $path['extension'] == 'xlsx' || $path['extension'] == 'csv') {
    //                 $fichier->type = 'excel';
    //             } elseif ($path['extension'] == 'doc' || $path['extension'] == 'docx') {
    //                 $fichier->type = 'word';
    //             }
    //             $fichier->save();
    //         }
    //     }
    //     $this->form = false;
    // }
}
