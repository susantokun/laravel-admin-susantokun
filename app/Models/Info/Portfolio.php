<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'info_portfolios';
    protected $primaryKey = 'id';
    protected $fillable = ['category_portfolio_id', 'title', 'slug_title', 'description', 'url_demo', 'url_youtube', 'number_sp', 'number_sstp', 'date_start', 'date_end', 'status'];

    public function category_portfolio()
    {
        return $this->belongsTo(CategoryPortfolio::class);
    }

}
