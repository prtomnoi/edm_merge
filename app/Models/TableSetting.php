<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableSetting extends Model
{
    use HasFactory;
    protected $table = 'table_settings';

    protected $fillable = [
        'facebook',
        'youtube',
        'url',
        'contact',
        'provider_id',
    ];

    public function provider ()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }
}
