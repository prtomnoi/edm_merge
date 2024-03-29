<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'title_en',
        'detail',
        'short_detail',
        'short_detail_en',
        'detail_en',
        'image',
        'status', 
        'news_category', 
        'signature', 
        'pin', 
        'top', 
        'provider_id', 
        'created_by', 
        'updated_by'
    ];

    public function images()
    {
        return $this->hasMany(NewsImage::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class, "id", "news_category");
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
