<?php

namespace App\Models\Demo;

use Illuminate\Database\Eloquent\Model;

class CategoryContent extends Model
{
    protected $table = 'demo_category_contents';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug_name', 'description', 'color', 'image', 'status'];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
