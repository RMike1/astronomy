<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrivacyPolicy extends Model
{
    /** @use HasFactory<\Database\Factories\PrivacyPolicyFactory> */
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
}
