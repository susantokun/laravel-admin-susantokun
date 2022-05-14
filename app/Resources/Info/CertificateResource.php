<?php

namespace App\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
			'title' => $this->title,
			'slug_title' => $this->slug_title,
			'description' => $this->description,
			'image' => $this->image,
			'activity_level' => $this->activity_level,
			'slug_activity_level' => $this->slug_activity_level,
			'date_of_activity' => $this->date_of_activity,
            'category' => $this->category_certificate->title,
            'color' => $this->category_certificate->color,
		];
    }
}
