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

    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return asset('images/toe_square_custom.jpg');
        }
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        return asset($this->image);
    }
}
