<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'info_experiences';
    protected $primaryKey = 'id';
    protected $fillable = ['place_id', 'content', 'status'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

}
