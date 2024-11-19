<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TermsOfUse extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('background_image') && ($model->getOriginal('background_image') !== null)) {
                Storage::disk('images')->delete($model->getOriginal('background_image'));
            }
        });
    }

    protected $casts=[
        'more_seo_metadata'=>'array',
        'social_media_seo_meta_data'=>'array',
    ];
}