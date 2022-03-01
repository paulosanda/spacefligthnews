<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetArticulesControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setup():void
    {
        parent::setup();
        $this->artisan('migrate');
        $this->get(route('articles.update'));
        
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
}
