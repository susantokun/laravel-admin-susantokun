<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

class Framework extends Model
{
    protected $table = 'info_frameworks';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug_name', 'description', 'url', 'image', 'status'];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

}
