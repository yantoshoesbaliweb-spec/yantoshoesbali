<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path',
        'sort_order',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleting(function (ProductImage $image) {
            \App\Services\MediaService::delete($image->image_path);
        });
    }

    /**
     * Get the product that owns this image.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
