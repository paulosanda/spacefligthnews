<?php

namespace App\Services;

use App\Models\News;

class UpdateArticle extends BaseService
{
    public function rules()
    {
        return [
            'id' => 'required','int',
            'featured' => 'bool',
            'title' => 'required', 'string',
            'url' => 'string',
            'imageUrl' => 'string',
            'newsSite' => 'string',
            'summary' => 'string',
            'updatedAt' => 'string'
        ];
    }

    public function execute($data)
    {
        $this->validate($data);

        $article = News::where('id', $data['id'])->update($data);

        return $article;
    }
}