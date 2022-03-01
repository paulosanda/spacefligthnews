<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;

class ArticulesControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    protected function setup():void
    {
        parent::setup();
        $this->artisan('migrate');
        $this->get(route('articles.store'));
        
    }

    public function test_challenge()
    {
        $this->get(route('challenge.home'))
        ->assertStatus(200);
    }
    
    /**
     * test_show
     *
     * @return void
     */
    public function test_index()
    {
        $this->get(route('articles.index'))
        ->assertStatus(200);
    }

    public function test_show()
    {
        $article_id = News::first();
        
        $this->get(route('articles.show',['id'=>$article_id->id]))
        ->assertJsonStructure([
           'data' => [
                'id',
                'featured',
                'title',
                'url',
                'imageUrl',
                'newsSite',
                'summary',
                'publishedAt',
                'featured',
            ]
        ]);

    }

    public function test_delete()
    {      
        $article_id = News::first();

        $this->delete(route('articles.delete',['id'=>$article_id->id]))
        ->assertStatus(200);
    }

    public function test_post()
    {
        $data['featured'] = 0;
        $data['title'] = $this->faker->title(50);
        $data['url'] = $this->faker->url();
        $data['imageUrl'] = $this->faker->url();
        $data['newsSite'] = $this->faker->url();
        $data['summary'] = $this->faker->text(500);

        $this->post(route('articles.create'),$data)
        ->assertStatus(201);
    }

    public function test_update_article()
    {
        $article = News::first();
       
        $data['featured'] = $article->featured;
        $data['title'] = $article->title;
        $data['url'] = $article->url;
        $data['imageUrl'] = $article->url;
        $data['newsSite'] = $article->url;
        $data['summary'] = $article->summary.'UPDATED TO TEST';
        
        $this->put(route('articles.update',['id'=>$article->id]),$data)
        ->assertStatus(200);
 
    }
}
