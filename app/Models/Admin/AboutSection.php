<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
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
        'section_image_2',
        'section_image_3',
        'video_type',
        'video_url',
        'title',
        'description',
        'item',
        'button_name',
        'button_url',
    ];
}
