<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Influencer extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'influencer';
    protected $fillable = [
        'name',
        'title',
        'facebook', 
        'facebook_subscribe', 
        'facebook_url', 
        'twitter', 
        'twitter_subscribe', 
        'twitter_url', 
        'youtube', 
        'youtube_subscribe', 
        'youtube_url', 
        'instagram', 
        'instagram_subscribe', 
        'instagram_url', 
        'icon', 
        'image', 
        'status', 
        'created_by', 
        'updated_by',
        "video_link", 
        "type_name", 
        "pin"
    ];
 
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
