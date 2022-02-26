<?php

namespace App\Services;

use App\Services\BaseService;
use Illuminate\Support\Facades\Http;

class UpdateNews extends BaseService
{
    private $news;

    public function __construct()
    {
        $this->news = config('services.newsgateway.uri');
    }
    /**
     * Update News service.
     *
     */
    public function execute()
    {
        try {
            return Http::get($this->news );
        } catch (\Exception $e) {
            return $e;
        }
        
    }
}