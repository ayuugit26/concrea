<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $casts = [
        'specs' => 'array',
        'is_hero' => 'boolean',
        'is_spotlight' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function category() { return $this->belongsTo(Category::class); }

    public function getImageUrlAttribute(): string
    {
        return asset('images/products/' . $this->image);
    }

    public function getInsituUrlAttribute(): ?string
    {
        return $this->image_insitu ? asset('images/products/' . $this->image_insitu) : null;
    }
}