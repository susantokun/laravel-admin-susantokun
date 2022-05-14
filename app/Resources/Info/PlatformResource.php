<?php

namespace App\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class PlatformResource extends JsonResource
{
    public function toArray($request)
    {
        return [
			'name' => $this->name,
			'slug_name' => $this->slug_name,
			'description' => $this->description,
			'status' => $this->status
		];
    }
}
