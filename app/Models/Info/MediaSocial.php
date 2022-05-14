<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

class MediaSocial extends Model
{
    protected $table = 'info_media_socials';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'github', 'youtube', 'linked_in', 'facebook', 'twitter', 'instagram', 'line', 'steam', 'status'];

    public function configurations()
    {
        return $this->hasMany(Configuration::class);
    }

}
