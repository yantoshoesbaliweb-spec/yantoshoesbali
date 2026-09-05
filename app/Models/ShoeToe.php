<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoeToe extends Model
{
    use HasFactory;

    protected $table = 'shoe_toes';

    protected $fillable = [
        'name',
        'image',
        'description',
        'sort_order',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleting(function (ShoeToe $shoeToe) {
            if (!empty($shoeToe->image)) {
                \App\Services\MediaService::delete($shoeToe->image);
            }
        });
    }

    public function getImageUrlAttribute()
    {
        $defaultImage = asset('images/toe_square_custom.jpg');

        if (empty($this->image) || $this->image === 'storage/' || $this->image === 'storage') {
            return $defaultImage;
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        // Verify physical file exists on disk
        $localPath = public_path($this->image);
        if (!file_exists($localPath)) {
            $storageRelative = \App\Services\MediaService::getStorageRelativePath($this->image);
            if ($storageRelative && !\Illuminate\Support\Facades\Storage::disk('public')->exists($storageRelative)) {
                return $defaultImage;
            }
        }

        return asset($this->image);
    }
}
