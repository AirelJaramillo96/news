<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class NewsController extends Controller
{
    //conect no news-api with guzzle

    public function index(Request $requestData)
    {

        $apiKey = Config::get('services.news_api.key');
        $client = new Client();
        $category = $requestData->category;
        $query = $requestData->q;
        $request = $client->get("https://newsapi.org/v2/top-headlines?country=us&category={$category}&q={$query}&apiKey={$apiKey}");
        $response = $request->getBody();
        $news = json_decode($response);
        return $news;
    }

}
