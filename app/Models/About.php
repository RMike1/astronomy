<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('logo') && ($model->getOriginal('logo') !== null)) {
                Storage::disk('images')->delete($model->getOriginal('logo'));
            }
            if ($model->isDirty('favicon') && ($model->getOriginal('favicon') !== null)) {
                Storage::disk('images')->delete($model->getOriginal('favicon'));
            }
            if ($model->isDirty('about_image') && ($model->getOriginal('about_image') !== null)) {
                Storage::disk('images')->delete($model->getOriginal('about_image'));
            }
            if ($model->isDirty('about_hero_video') && ($model->getOriginal('about_hero_video') !== null)) {
                Storage::disk('images')->delete($model->getOriginal('about_hero_video'));
            }
            if ($model->isDirty('about_description') && ($model->getOriginal('about_description') !== null)) {
                Storage::disk('images')->delete($model->getOriginal('about_description'));
            }
        });
    }
}