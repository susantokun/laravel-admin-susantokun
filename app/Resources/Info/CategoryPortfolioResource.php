<?php

namespace App\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryPortfolioResource extends JsonResource
{
    public function toArray($request)
    {
        return [
			'platform_id' => $this->platform_id,
			'framework_id' => $this->framework_id,
			'description' => $this->description,
			'status' => $this->status
		];
    }
}
