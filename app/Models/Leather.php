<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leather extends Model
{
    use HasFactory;

    protected $table = 'leathers';

    protected $fillable = [
        'name',
        'image',
        'traits',
        'sort_order',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleting(function (Leather $leather) {
            if (!empty($leather->image)) {
                \App\Services\MediaService::delete($leather->image);
            }
        });
    }

    public function getTraitsListAttribute(): array
    {
        if (empty($this->traits)) {
            return [];
        }
        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $this->traits))));
    }

    public function getImageUrlAttribute()
    {
        $defaultImage = asset('images/leather_calfskin.jpg');

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
