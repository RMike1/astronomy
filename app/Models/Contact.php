<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(ContactObserver::class)]

class Contact extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'message'
    ];
}
