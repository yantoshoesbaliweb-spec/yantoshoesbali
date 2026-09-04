<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'series',
        'category_id',
        'image',
        'leather',
        'turnaround',
        'status',
        'sort_order',
    ];

    /**
     * Get the category this product belongs to.
     */
    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get all images for this product.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    /**
     * Get the primary image (first image or fallback to image column).
     */
    public function getPrimaryImageAttribute()
    {
        $firstImage = $this->images->first();
        if ($firstImage) {
            return $firstImage->image_path;
        }
        return $this->image;
    }

    /**
     * Scope: only active products.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    /**
     * Scope: ordered by sort_order then id.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
