<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapperController extends Controller
{
    public function scrapper(Request $request)
    {
        /**
         * @param CreateArticleAPIRequest $request
         * @return Response
         *
         * @SWG\Post(
         *      path="/scrapper",
         *      summary="Récupérer le contenu d'une page",
         *      tags={"Scrapper"},
         *      description="Récupérer le contenu d'une page",
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

        $data = $this->orbita($request->lien);

        return ResponseController::response(true, "hello", $data);
    }

    public static function orbita(string $url)
    {
        $client = new Client();

        $website = $client->request('GET', $url);

        return (object) [
            'url' => $website->filter('meta[property="og:url"]')->attr('content'),
            'title' => $website->filter('meta[property="og:title"]')->attr('content'),
            'site_name' => $website->filter('meta[property="og:site_name"]')->attr('content'),
            'description' => $website->filter('meta[property="og:description"]')->attr('content'),
            'image' => $website->filter('meta[property="og:image"]')->attr('content'),
            'price' => $website->filter('meta[property="product:price:amount"]')->attr('content'),
            'devise' => $website->filter('meta[property="product:price:currency"]')->attr('content'),
            'marque' => $website->filter('.product-manufacturer > span.value')->text(),
            'reference' => $website->filter('.product-reference > span.value')->text(),
            'prix' => $website->filter('span.price')->attr('content'),
        ];
    }
}
