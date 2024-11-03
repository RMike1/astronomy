<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SocialMedia;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public function social_media(){
        return $this->hasMany(SocialMedia::class);
    }
}
