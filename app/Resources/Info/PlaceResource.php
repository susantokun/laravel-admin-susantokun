<?php

namespace App\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
			'name' => $this->name,
			'description' => $this->description,
			'url' => $this->url,
			'color' => $this->color,
			'status' => $this->status
		];
    }
}
