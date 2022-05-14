<?php

namespace App\Resources\Demo;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryContentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'color' => $this->color,
            'image' => $this->image,
        ];
    }
}
