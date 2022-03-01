<?php

namespace App\Services;

use App\Models\News;
use App\Models\Launche;
use App\Models\Event;
use App\Http\Traits\ReplaceArrayKey;

class InsertNews
{
    use ReplaceArrayKey;

    public function execute(Array $articles)
    {
        foreach ($articles as $article) {
            ReplaceArrayKey::array_replace_key($article, 'id', 'reference_id', $article);
            
            $articleId = News::where('reference_id',$article['reference_id'])->count();
            
            if ($articleId == 0) {
                $insertArticle = News::create($article);

                $article['launches']['news_id'] = $insertArticle->id;
                
                if (isset($article['launches']['id'])) {
                    $article['launches']['news_id'] = $insertArticle->id;
                    Launche::create($article['launches']);
                }

                if(isset($article['events']['id'])) 
                {
                    $article['events']['news_id'] = $insertArticle->id;
                    Event::create($article['events']);
                }
                
            }
        }
    }
}