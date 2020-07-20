<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::with('authors')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO Create 'Valid' trait for models and store validation rules in there
        $data = $this->validate($request, [
            'title' => 'string|required',
            'snippet' => 'string',
            'content' => 'json|required',
            'authors' => 'array|required',
            'authors.*' => 'numeric|required',
            'blog_id' => 'numeric|required'
        ]);

        $authorIds = Arr::pull($data, 'authors');
        $article = new Article($data);

        if($article->save()){
            $article->authors()->attach($authorIds);
            return response()->json($article);
        }

        else
            return response(['message' => $article->error_get_last], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, $id)
    {
        $article = $article->with('authors')->find($id);

        return $article ? response()->json($article) : response(['message' => 'No article found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
