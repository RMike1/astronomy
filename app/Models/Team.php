<?php

namespace App\Models;

use App\Models\SocialMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public function social_media(){
        return $this->hasMany(SocialMedia::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('image') && ($model->getOriginal('image') !== null)) {
                Storage::disk('images')->delete($model->getOriginal('image'));
            }
        });
    }

}
