<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get Articles
        $articles = Article::latest()->paginate(15);

        // Return collection of articles as a resource
        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ArticleResource
     */
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Article::findOrFail($request->id) : new Article();

        $article->title = $request->input('title');
        $article->body = $request->input('body');

        return $article->save() ? new ArticleResource($article) : false;
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return ArticleResource
     */
    public function show($id)
    {
        // Get Single Artice
        $article = Article::findOrFail($id);

        // Return single article as a resource
        return new ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return ArticleResource
     */
    public function destroy($id)
    {
        // Get article
        $article = Article::findOrFail($id);

        return Article::findOrFail($id)->delete() ? new ArticleResource($article) : false;
    }
}
