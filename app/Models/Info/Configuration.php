<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'info_configurations';
    protected $primaryKey = 'id';
    protected $fillable = ['media_social_id', 'website_name', 'author', 'url', 'logo', 'favicon', 'avatar', 'email', 'telp', 'place_of_birth', 'date_of_birth', 'profession', 'job_specialization', 'address', 'latitude', 'longitude', 'api_key', 'website_1', 'website_2', 'website_3', 'keywords', 'metatext', 'about', 'introduction', 'status'];

    public function media_social()
    {
        return $this->belongsTo(MediaSocial::class);
    }

}
