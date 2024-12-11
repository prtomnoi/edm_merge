<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EiPortfolio extends Model
{
    use HasFactory;

    protected $table = 'ei_portfolio';
    protected $fillable = [
        'title',
        'title_en',
        'short_detail',
        'short_detail_en',
        'detail',
        'detail_en',
        'signature',
        'image',
        'pin',
        'status',
        'date',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'delete_by',
        'delete_at'
    ];

    public function images() {
        return $this->hasMany(EiPortfolioImage::class, 'ei_portfolio_id');
    }
}
