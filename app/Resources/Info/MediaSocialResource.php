<?php

namespace App\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaSocialResource extends JsonResource
{
    public function toArray($request)
    {
        return [
			'title' => $this->title,
			'github' => $this->github,
			'youtube' => $this->youtube,
			'linked_in' => $this->linked_in,
			'facebook' => $this->facebook,
			'twitter' => $this->twitter,
			'instagram' => $this->instagram,
			'line' => $this->line,
			'steam' => $this->steam,
			'status' => $this->status
		];
    }
}
