<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class MediaService
{
    /**
     * List of protected prefixes that must NEVER be deleted (core static assets).
     */
    protected static array $protectedPrefixes = [
        'images/',
        'adminhmd/',
        'css/',
        'js/',
        'build/',
        'vendor/',
        'assets/',
    ];

    /**
     * Delete a media file from physical storage safely.
     *
     * @param string|null $path
     * @return bool True if a file was deleted, false otherwise
     */
    public static function delete(?string $path): bool
    {
        if (empty($path) || !is_string($path)) {
            return false;
        }

        // Normalize URL if full URL is passed
        $parsedPath = parse_url($path, PHP_URL_PATH);
        if (!empty($parsedPath)) {
            $path = $parsedPath;
        }

        // Standardize directory separators and trim
        $normalized = str_replace('\\', '/', trim($path));
        $normalized = ltrim($normalized, '/');

        // Check if path is protected static asset
        if (static::isProtected($normalized)) {
            Log::debug("MediaService: Skipping protected static asset: {$path}");
            return false;
        }

        // Determine relative path for the public disk
        $diskPath = static::getStorageRelativePath($normalized);
        if (empty($diskPath)) {
            return false;
        }

        $deleted = false;

        try {
            // 1. Delete via Laravel Storage facade on 'public' disk
            if (Storage::disk('public')->exists($diskPath)) {
                $deleted = Storage::disk('public')->delete($diskPath);
            }

            // 2. Fallback: direct storage_path check
            $fullStoragePath = storage_path('app/public/' . $diskPath);
            if (file_exists($fullStoragePath) && is_file($fullStoragePath)) {
                $deleted = @unlink($fullStoragePath) || $deleted;
            }

            // 3. Fallback: direct public_path check (in case of direct symlink/file)
            $fullPublicPath = public_path('storage/' . $diskPath);
            if (file_exists($fullPublicPath) && is_file($fullPublicPath)) {
                $deleted = @unlink($fullPublicPath) || $deleted;
            }

            if ($deleted) {
                Log::info("MediaService: Successfully deleted media file: {$path} (resolved disk path: {$diskPath})");
            }
        } catch (\Throwable $e) {
            Log::error("MediaService: Error deleting media file {$path}: " . $e->getMessage());
            return false;
        }

        return $deleted;
    }

    /**
     * Delete multiple media files.
     *
     * @param array $paths
     * @return int Count of successfully deleted files
     */
    public static function deleteMany(array $paths): int
    {
        $count = 0;
        foreach ($paths as $path) {
            if (static::delete($path)) {
                $count++;
            }
        }
        return $count;
    }

    /**
     * Check whether a given path is a protected static asset.
     *
     * @param string|null $path
     * @return bool
     */
    public static function isProtected(?string $path): bool
    {
        if (empty($path)) {
            return true;
        }

        $normalized = str_replace('\\', '/', trim($path));
        $normalized = ltrim($normalized, '/');

        foreach (static::$protectedPrefixes as $prefix) {
            if (str_starts_with($normalized, $prefix)) {
                return true;
            }
            // Check if prefixed with public/
            if (str_starts_with($normalized, 'public/' . $prefix)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Convert an arbitrary path to the relative path within the 'public' disk.
     * Example:
     *   "storage/products/abc.jpg" -> "products/abc.jpg"
     *   "/storage/hero/xyz.png"    -> "hero/xyz.png"
     *   "public/storage/a/b.mp4"   -> "a/b.mp4"
     *   "products/abc.jpg"         -> "products/abc.jpg"
     *
     * @param string $path
     * @return string|null
     */
    public static function getStorageRelativePath(string $path): ?string
    {
        $normalized = str_replace('\\', '/', trim($path));
        $normalized = ltrim($normalized, '/');

        if (str_starts_with($normalized, 'public/storage/')) {
            $normalized = substr($normalized, strlen('public/storage/'));
        } elseif (str_starts_with($normalized, 'storage/')) {
            $normalized = substr($normalized, strlen('storage/'));
        } elseif (str_starts_with($normalized, 'public/')) {
            $normalized = substr($normalized, strlen('public/'));
        }

        $normalized = ltrim($normalized, '/');

        return !empty($normalized) ? $normalized : null;
    }
}
