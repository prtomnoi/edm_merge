<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'campaign';
    protected $fillable = [
        'title', 
        'title_en', 
        'short_detail', 
        'short_detail_en', 
        'detail', 
        'detail_en', 
        'signature', 
        'group_id', 
        'provider_id', 
        'image', 
        'status', 
        'top', 
        'created_by', 
        'updated_by'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function group()
    {
        return $this->hasMany(Group::class, "id" , 'group_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
