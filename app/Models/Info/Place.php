<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'info_places';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'url', 'color', 'status'];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

}
