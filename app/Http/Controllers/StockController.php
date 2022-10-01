<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    public $priorities;

    public function __construct()
    {
        $this->priorities = (object) array(
        "Centrale 1"    => 1,
        "Centrale 2"    => 2,
        "Centrale 3"    => 3,
        "Organe 1"      => 4,
        "Organe 2"      => 5,
        "Organe 3"      => 6,
        "Cable 1"       => 7,
        "Cable 2"       => 8,
        "Accessoire 1"  => 9,
        "Accessoire 2"  => 10,
        "Forfait 1"     => 11,
        "Forfait 2"     => 12,
        );
    }

    public function article_url(Request $request)
    {
        /**
         * @param CreateArticleAPIRequest $request
         * @return Response
         *
         * @SWG\Post(
         *      path="/article_url",
         *      summary="Ajouter un article à partir d'un site",
         *      tags={"Article"},
         *      description="Ajouter un article à partir d'un site",
         *      produces={"application/json"},
         *
         *      @SWG\Parameter(
         *          name="lien",
         *          in="formData",
         *          description="Lien du site",
         *          required=true,
         *          type="string"
         *      ),
         *      @SWG\Response(
         *          response=200,
         *          description="successful operation",
         *          @SWG\Schema(
         *              type="object",
         *              @SWG\Property(
         *                  property="success",
         *                  type="boolean"
         *              ),
         *              @SWG\Property(
         *                  property="data",
         *                  ref="#/definitions/Article"
         *              ),
         *              @SWG\Property(
         *                  property="message",
         *                  type="string"
         *              )
         *          )
         *      )
         * )
         */

        $data = ScrapperController::orbita($request->lien);


        return ResponseController::response(true, "hello", $data);
    }

    public function addArticle($data)
    {
        $article = Article::firstOrCreate([
            'name' => $data->title,
            'reference' => $data->reference,
            'description' => $data->description,
            // 'quantity' => 'integer',
            // 'brand_id' => 'integer',
            // 'provider_id' => 'integer',
            // 'storage_id' => 'integer',
            'priority' => 1,
            'price' => $data->prix,
            // 'photo' => 'string',
        ]);

        $image = "stock/articles/$article->id/" . basename($data->image);
        Storage::disk('public')->put($image, file_get_contents($data->image));

        $article->photo = $image;
        $article->save();
    }
}
