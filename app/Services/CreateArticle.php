<?php

namespace App\Services;

use App\Models\News;

class CreateArticle extends BaseService
{
    public function rules()
    {
        return [
            'featured' => 'bool',
            'title' => 'required', 'string',
            'url' => 'string',
            'imageUrl' => 'string',
            'newsSite' => 'string',
            'summary' => 'string',
            'publishedAt' => 'string'
        ];
    }

    public function execute($data)
    {
        $this->validate($data);

        $insert = News::create($data);

        return $insert;
    }
}