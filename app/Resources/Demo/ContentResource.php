<?php

namespace App\Resources\Demo;

use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category_content->name,
            'color' => $this->category_content->color,
            'image' => $this->category_content->image,
            'url_github' => $this->url_github,
            'url_youtube' => $this->url_youtube,
            'url_ld' => $this->url_ld,
            'url_sc' => $this->url_sc,
            'url_db' => $this->url_db,
        ];
    }
}
