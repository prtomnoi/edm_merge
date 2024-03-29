<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandingGallery extends Model
{
    use HasFactory;
    protected $table = 'branding_gallery';
    protected $fillable = ['path', 'image' , 'status'];

}
