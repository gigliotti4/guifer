<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";

    protected $fillable = [
        'sections',
        'email',
        'phone',
        'domicile',
        'social_networks',
        'images',
        'metadata',
        'form',
        'text',
        'schedule',
        'captcha',
        'files'
    ];

    protected $casts = [
        'sections' => 'array',
        'email' => 'array',
        'phone' => 'array',
        'domicile' => 'array',
        'social_networks' => 'array',
        'images' => 'array',
        'metadata' => 'array',
        'form' => 'array',
        'text' => 'array',
        'schedule' => 'array',
        'captcha' => 'array',
        'files' => 'array'
    ];
}
