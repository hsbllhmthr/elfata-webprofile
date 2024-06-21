<?php

namespace App\Models\Admin;


use App\Traits\Shareable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    use sluggable;
    use Shareable;


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'maxLength'          => null,
                'maxLengthKeepWords' => true,
                'method'             => null,
                'separator'          => '-',
                'unique'             => true,
                'uniqueSuffix'       => null,
                'includeTrashed'     => false,
                'reserved'           => null,
                'onUpdate'           => true
            ]
        ];
    }

    // Share social media
    protected $shareOptions = [
        'columns' => [
            'title' => 'title'
        ],
        'url' => null
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'category_id',
        'category_name',
        'user_id',
        'author_name',
        'title',
        'description',
        'short_description',
        'section_image',
        'section_image_2',
        'type',
        'slug',
        'view',
        'order',
        'status',
        'tag',
        'meta_description',
        'meta_keyword',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Category','category_id','id');
    }
}
