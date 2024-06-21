<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'style',
        'section_image',
        'title',
        'description',
        'button_name',
        'button_url',
        'button_name_2',
        'button_url_2',
        'button_image',
        'button_image_url',
        'button_image_2',
        'button_image_url_2',
        'button_image_3',
        'button_image_url_3',
    ];
}
