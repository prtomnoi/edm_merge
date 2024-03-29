<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTuberGallery extends Model
{
    use HasFactory;
    protected $table = 'vtuber_gallery';
    protected $fillable = ['path', 'image' , 'status'];

}
