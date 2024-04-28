<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscriber_arabic_name',
        'subscriber_english_name',
        'subscriber_reference',
        'subscriber_type',
        'identity_type',
        'identity_number',
        'arabic_address',
        'english_address',
        'about_subscriber_arabic',
        'about_subscriber_english',
        'subscriber_image',
    ];
}
