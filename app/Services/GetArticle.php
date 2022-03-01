<?php

namespace App\Services;

use App\Models\News;

class GetArticle extends BaseService
{
    public function execute($id)
    {
        $article = News::with('events','launches')->find($id);

        return $article;
    }
}