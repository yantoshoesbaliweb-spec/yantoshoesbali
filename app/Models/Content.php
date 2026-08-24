<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    /**
     * Retrieve content by key, returning default array if not found.
     */
    public static function getByKey(string $key, array $default = []): array
    {
        $record = static::where('key', $key)->first();
        if ($record && is_array($record->content)) {
            return $record->content;
        }

        return $default;
    }

    /**
     * Set or update content by key.
     */
    public static function setByKey(string $key, array $content): static
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['content' => $content]
        );
    }
}
