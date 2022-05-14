<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

class CategoryPortfolio extends Model
{
    protected $table = 'info_category_portfolios';
    protected $primaryKey = 'id';
    protected $fillable = ['platform_id', 'framework_id', 'description', 'status'];

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
    public function framework()
    {
        return $this->belongsTo(Framework::class);
    }
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
