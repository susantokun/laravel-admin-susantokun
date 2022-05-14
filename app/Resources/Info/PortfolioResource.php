<?php

namespace App\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
{
    public function toArray($request)
    {
        return [
			'title' => $this->title,
			'slug_title' => $this->slug_title,
			'description' => $this->description,
			'url_demo' => $this->url_demo,
			'url_youtube' => $this->url_youtube,
			'number_sp' => $this->number_sp,
			'number_sstp' => $this->number_sstp,
			'date_start' => $this->date_start,
			'date_end' => $this->date_end,
            'framework_image' => $this->category_portfolio->framework->image,
            'framework_name' => $this->category_portfolio->framework->name,
            'platform_name' => $this->category_portfolio->platform->name,
		];
    }
}
