<?php

namespace App\Services;

use App\Models\News;

class GetArticle extends BaseService
{    
    /**
     * execute
     *
     * @param  mixed $id
     * @return void
     */
    public function execute($id)
    {
        $article = News::with('events','launches')->find($id);

        return $article;
    }
}