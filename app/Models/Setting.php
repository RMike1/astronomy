<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;

    protected $guarded=[];

    protected $casts=[
        'more_seo_metadata'=>'array',
        'social_media_seo_meta_data'=>'array',
    ];
}