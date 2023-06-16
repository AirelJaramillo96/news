<?php

namespace App\Http\Controllers;

use App\Models\Article;
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

    public function storeArticle(Request $request) {
        $article = Article::where('url', $request->url)->first();
        if ($article) {
            $article->total_views = $article->total_views + 1;
            $article->save();
            return response()->json(['message' => 'Article updated successfully'], 200);
        } else {
            //use fill
            $article = new Article();
            $article->title = $request->title;
            $article->url_image = $request->url_image;
            $article->url = $request->url;
            $article->total_views = 1;
            $article->save();
            return response()->json(['message' => 'Article created successfully'], 200);
        }
    }

    public function getMostViewedArticles() {
        $articles = Article::orderBy('total_views', 'desc')->take(7)->get();
        return $articles;
    }

}
