<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioItemImage extends Model
{
    use HasFactory;
    protected $fillable = ['image' , 'portfolio_item_id'];

    public function portfolioItem()
    {
        return $this->belongsTo(PortfolioItem::class);
    }
}
