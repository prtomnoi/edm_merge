<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link', 'group_id', 'image', 'external_link' , 'status'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
