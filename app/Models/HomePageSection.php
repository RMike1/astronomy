<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
