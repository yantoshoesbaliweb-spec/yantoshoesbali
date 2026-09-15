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
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget("content.{$model->key}");
        });

        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget("content.{$model->key}");
        });
    }

    /**
     * Retrieve content by key, returning default array if not found.
     */
    public static function getByKey(string $key, array $default = []): array
    {
        return \Illuminate\Support\Facades\Cache::rememberForever("content.{$key}", function () use ($key, $default) {
            $record = static::where('key', $key)->first();
            if ($record && is_array($record->content)) {
                return $record->content;
            }
            return $default;
        });
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
