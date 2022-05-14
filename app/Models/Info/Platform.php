<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table = 'info_platforms';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug_name', 'description', 'status'];

    public function portfolios()
    {
        return $this->hasMany(CategoryPortfolio::class);
    }
}
