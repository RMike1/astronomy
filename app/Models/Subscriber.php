<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\SubscriberObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(SubscriberObserver::class)]
class Subscriber extends Model
{
    use HasFactory,SoftDeletes , Notifiable;

    protected $fillable=[
        'email',
        // 'created_at',
    ];
}
