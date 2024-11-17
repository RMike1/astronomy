<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $guraded=[];

    protected function casts(): array
    {
        return [
            'seo_metadata'=>'array',
            'email_settings'=>'array',
            'social_network'=>'array',
            'more_configs'=>'array',
        ];
    }
}
