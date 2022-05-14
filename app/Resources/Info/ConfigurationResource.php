<?php

namespace App\Resources\Info;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfigurationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
			'website_name' => $this->website_name,
			'author' => $this->author,
			'url' => $this->url,
			'logo' => $this->logo,
			'favicon' => $this->favicon,
			'avatar' => $this->avatar,
			'email' => $this->email,
			'telp' => $this->telp,
			'place_of_birth' => $this->place_of_birth,
			'date_of_birth' => $this->date_of_birth,
			'profession' => $this->profession,
			'job_specialization' => $this->job_specialization,
			'address' => $this->address,
			'latitude' => $this->latitude,
			'longitude' => $this->longitude,
			'api_key' => $this->api_key,
			'website_1' => $this->website_1,
			'website_2' => $this->website_2,
			'website_3' => $this->website_3,
			'keywords' => $this->keywords,
			'metatext' => $this->metatext,
			'about' => $this->about,
			'introduction' => $this->introduction,
            'github' => $this->media_social->github,
            'youtube' => $this->media_social->youtube,
            'linked_in' => $this->media_social->linked_in,
            'facebook' => $this->media_social->facebook,
            'twitter' => $this->media_social->twitter,
            'instagram' => $this->media_social->instagram,
            'line' => $this->media_social->line,
		];
    }
}
