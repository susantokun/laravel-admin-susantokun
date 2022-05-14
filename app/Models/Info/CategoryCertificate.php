<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

class CategoryCertificate extends Model
{
    protected $table = 'info_category_certificates';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'slug_title', 'description', 'color', 'status'];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

}
