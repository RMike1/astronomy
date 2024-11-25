<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Observers\HomePageSectionObserver;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;


#[ObservedBy(HomePageSectionObserver::class)]
class HomePageSection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('full_description') && ($model->getOriginal('full_description') !== null)) {
                Storage::disk('images')->delete($model->getOriginal('full_description'));
            }
            if ($model->isDirty('image') && ($model->getOriginal('image') !== null)) {
                Storage::disk('images')->delete($model->getOriginal('image'));
            }
            if ($model->isDirty('background_video') && ($model->getOriginal('background_video') !== null)) {
                Storage::disk('images')->delete($model->getOriginal('background_video'));
            }
        });

        static::deleting(function ($model) {
          

            static::deleting(function ($model) {
                if ($model->isForceDeleting()) {
                    if ($model->full_description) {
                        Storage::disk('images')->delete($model->full_description);
                    }
                    if ($model->image) {
                        Storage::disk('images')->delete($model->image);
                    }
                    if ($model->background_video) {
                        Storage::disk('images')->delete($model->background_video);
                    }
                }
            });

        });
    }

    protected $casts=[
        'more_seo_metadata'=>'array',
        'social_media_seo_meta_data'=>'array',
    ];

}