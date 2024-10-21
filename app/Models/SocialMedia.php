<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class SocialMedia extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function teams(){
        return $this->belongsTo(Team::class);
    }
}
