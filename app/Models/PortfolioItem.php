<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioItem extends Model
{
    use HasFactory;

    use SoftDeletes;

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
        'event_date',
        'created_by',
        'updated_by',
        'deleted_by',
        'top',
    ];
    public function images()
    {
        return $this->hasMany(PortfolioItemImage::class);
    }
}

