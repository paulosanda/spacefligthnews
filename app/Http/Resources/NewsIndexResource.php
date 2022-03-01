<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsIndexResource extends JsonResource
{
    public function toArray($request)
    {
        return [
           'id'=> $this->id,
           'featured'=> $this->feature,
           'title' => $this->title,
           'url' => $this->url,
           'imageUrl' => $this->imageUrl,
           'newsSite' => $this->newsSite,
           'summary' => $this->summary,
           'publishedAt' => $this->publishedAt,
           'launches' => [
               [
                    'id' => $this->launches->id ?? null,
                    'provider' => $this->launches->provider ?? null,
               ]
               
           ],
           'events' => [
               [
                   'id' => $this->events->id ?? null,
                   'provider' => $this->events->id ?? null
               ]
           ]
        ];
    }
}