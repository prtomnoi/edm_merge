<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCenter extends Model
{
    use HasFactory;

    protected $table = 'contact_centers';

    protected $fillable = [
        "name",
        "email",
        "phone",
        "user_company",
        "message",
        "company",
        "status_email",
    ];
}
