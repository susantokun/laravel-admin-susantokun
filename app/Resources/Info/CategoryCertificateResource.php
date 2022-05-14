<?php

namespace App\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryCertificateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
			'title' => $this->title,
			'slug_title' => $this->slug_title,
			'description' => $this->description,
			'color' => $this->color,
			'status' => $this->status
		];
    }
}
