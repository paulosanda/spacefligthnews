<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UpdateNews;
use App\Services\InsertNews;
use App\Services\GetNews;
use App\Services\GetArticle;
use App\Services\DeleteNews;
use App\Services\CreateArticle;
use App\Services\UpdateArticle;
use App\Http\Resources\NewsIndexResource;
use DateTime;

class ArticlesController extends Controller
{
     
    /**
     * /**
     * List Orders from specific wallet.
     *
     *  @OA\Get(
     *     path="/api/articles",
     *     tags={"All Articles"},
     *     summary="List articles with pagination",
     *     description="Returns articles",
     *
     *     @OA\Response(
     *          response="200",
     *          description="Success",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     * )
     * 
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
     * 
     * @OA\Post(
     *      path="/api/articles",
     *      tags={"Articles"},
     *      summary="Create a new article",
     *
     * @OA\RequestBody(
     *      description="Create a new article",
     *      required=true,
     *      @OA\JsonContent(
     *          example={
     *              "featured":0,
     *              "title": "Titulo",
     *              "url":"https://testes.teste",
     *              "imageUrl":"https://testes.teste/image",
     *              "newsSite": "https://testes.teste/news",
     *              "summary":"Summary",
     *              "publishedAt":"20222-03-02",
     *          }
     *      )
     *  ),
     *
     *
     *     @OA\Response(
     *          response="202",
     *          description="Success",
     *     ),
     *
     *      @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     * )
     * 
     * create
     *
     * @param  mixed $request
     * @return void
     */
    public function create(Request $request)
    { 
        $create = app(CreateArticle::class)->execute([
            'featured' => $request->featured,
            'title' => $request->title,
            'url' => $request->url,
            'imageUrl' => $request->imageUrl,
            'newsSite' => $request->newsSite,
            'summary' => $request->summary,
            'publishedAt' => date('Y-m-d H:i:s')
        ]);
        
        return $create;
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
     * @OA\Get(
     *      path="/api/articles/{id}",
     *      tags={"Articles"},
     *      summary="Get a article",
     *
     * @OA\Parameter(
     *          name="id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              example=5,
     *          )
     *      ),
     *
     *
     *     @OA\Response(
     *          response="202",
     *          description="Success",
     *           @OA\JsonContent(
     *              example={
     *                  "data": {
     *                      {
     *                          "id":5,
     *                          "featured":null,
     *                          "title":"Titulo",
     *                          "url":"https://testes.teste",
     *                          "imageUrl":"https://testes.teste/image",
     *                          "newsSite":"https://testes.teste/news",
     *                          "summary":"fasdf asdf asdfasdf asdf sadf asdfsadf asdf sadf sdf",
     *                          "publishedAt":"2022-03-02 12:01:02",
     *                          "launches": {
     *                              "id":null,
     *                              "provider":null, 
     *                          },
     *                          "events": {
     *                              "id":null,
     *                              "provider":null,
     *                          }
     *                      }
     *                  }
     *              }
     *          )
     *     ),
     *
     *      @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     * )
     * 
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
     * @OA\Put(
     *      path="/api/articles/{id}",
     *      tags={"Articles"},
     *      summary="Update a article",
     *          @OA\Parameter(
     *              name="id",
     *              description="Article id",
     *              required=true,
     *              in="path",
     *              @OA\Schema(
     *                  type="integer",
     *                  example=5,
     *              )
     *          ),
     * 
     *      @OA\RequestBody(
     *          description="Update a article",
     *          required=true,
     *          @OA\JsonContent(
     *              example={
     *                  "featured":0,
     *                  "title": "Titulo",
     *                  "url":"https://testes.teste",
     *                  "imageUrl":"https://testes.teste/image",
     *                  "newsSite":"https://testes.teste/news",
     *                  "summary":"Summary",
     *                  }
     *              )
     *          ),
     * 
     *      @OA\Response(
     *          response="200",
     *          description="Success",
     *     ),
     *
     *      @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     * 
     * )
     * 
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = app(UpdateArticle::class)->execute([
            'id' => $id,
            'title' => $request->title,
            'url' => $request->url,
            'imageUrl' => $request->imageUrl,
            'newsSite' => $request->newsSite,
            'summary' => $request->summary,
            'updatedAt' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * @OA\Delete(
     *      path="/api/articles/{id}",
     *      tags={"Articles"},
     *      summary="Delete a article",
     *          @OA\Parameter(
     *              name="id",
     *              description="Article id",
     *              required=true,
     *              in="path",
     *              @OA\Schema(
     *                  type="integer",
     *                  example=5,
     *              )
     *          ),
     *      @OA\Response(
     *          response="200",
     *          description="Success",
     *     ),
     *
     *      @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     * 
     * ),
     * 
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
