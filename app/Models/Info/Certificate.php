<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'info_certificates';
    protected $primaryKey = 'id';
    protected $fillable = ['category_certificate_id', 'title', 'slug_title', 'description', 'image', 'activity_level', 'slug_activity_level', 'date_of_activity', 'status'];

    public function category_certificate()
    {
        return $this->belongsTo(CategoryCertificate::class);
    }

}
