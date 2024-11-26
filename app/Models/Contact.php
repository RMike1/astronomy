<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\ContactObserver;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(ContactObserver::class)]

class Contact extends Model
{
    use HasFactory, Notifiable;

    protected $fillable=[
        'name',
        'email',
        'message'
    ];
}
