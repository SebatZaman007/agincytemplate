<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavLogo extends Model
{
    use HasFactory;

    protected $fillable=[
        'logo_link',
        'logo_image',
        'logo_name'
    ];
}
