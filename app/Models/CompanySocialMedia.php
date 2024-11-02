<?php

namespace App\Models;

use App\Enums\SocialMediaType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanySocialMedia extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $casts = [
        'platform' => SocialMediaType::class,
        'is_active' => 'boolean',
    ];
}
