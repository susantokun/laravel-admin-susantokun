<?php

namespace App\Models\Demo;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'demo_contents';
    protected $primaryKey = 'id';
    protected $fillable = ['category_content_id', 'title', 'slug_title', 'description', 'url_github', 'url_youtube', 'url_ld', 'url_sc', 'url_db', 'status'];

    public function category_content()
    {
        return $this->belongsTo(CategoryContent::class);
    }

}
