<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EiPortfolioImage extends Model
{
    use HasFactory;

    protected $table = 'ei_portfolio_images';

    protected $fillable = [
        'ei_portfolio_id',
        'image',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'delete_by',
        'delete_at'
    ];

    public function eiPortfolio(){
        return $this->belongsTo(EiPortfolio::class, 'ei_portfolio_id');
    }
}
