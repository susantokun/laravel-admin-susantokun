<?php

namespace App\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
			'content' => $this->content,
            'name' => $this->place->name,
            'url' => $this->place->url,
            'color' => $this->place->color,
		];
    }
}
