<?php

namespace App\Services;

use App\Models\News;

class DeleteNews extends BaseService
{
    public function execute($id)
    {
        $delete = News::findOrFail($id)->delete();

        return $delete;
    }
}