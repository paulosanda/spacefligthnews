<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UpdateNews;
use App\Services\InsertNews;
use App\Services\GetNews;
use App\Services\GetArticle;
use App\Services\DeleteNews;
use App\Http\Resources\NewsIndexResource;

class GetArticlesController extends Controller
{
     
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $news = app(GetNews::class)->execute();
        return NewsIndexResource::collection($news);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $articles = app(UpdateNews::class)->execute();
        
        $insert = app(InsertNews::class)->execute($articles);

        return $insert;
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = app(GetArticle::class)->execute($id);

        return new NewsIndexResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $execute = app(DeleteNews::class)->execute($id);

        return $execute;
    }
}
