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

    public function getTraitsListAttribute(): array
    {
        if (empty($this->traits)) {
            return [];
        }
        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $this->traits))));
    }

    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return asset('images/leather_calfskin.jpg');
        }
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        return asset($this->image);
    }
}
