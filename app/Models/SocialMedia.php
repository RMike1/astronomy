<?php

namespace App\Models;

use App\Models\Team;
use App\Enums\SocialMediaType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMedia extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function teams(){
        return $this->belongsTo(Team::class);
    }

    protected $casts = [
        'platform' => SocialMediaType::class,
        'is_active' => 'boolean',
    ];


}
