<?php

namespace App\Services;

use App\Models\News;
use App\Services\BaseService;

/**
 * GetNews
 */
class GetNews extends BaseService
{    
    /**
     * execute
     *
     * @return void
     */
    public function execute()
    {
        $news = News::with('events','launches')->paginate(5);
        return $news;
    }
}