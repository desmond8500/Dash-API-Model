<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapperController extends Controller
{
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
