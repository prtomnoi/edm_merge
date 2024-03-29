<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VtuberVideo extends Model
{
    use HasFactory;
    protected $table = 'vtuber_video';
    protected $fillable = ['title', 'link', 'status'];
}
