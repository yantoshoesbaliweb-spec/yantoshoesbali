<?php

namespace App\Helpers;

/**
 * Lightweight SEO helper for Yanto Shoes Bali.
 * Sets meta tags, Open Graph, Twitter Card, and JSON-LD structured data.
 */
class SeoHelper
{
    protected static array $meta = [];
    protected static array $og = [];
    protected static array $twitter = [];
    protected static array $jsonLd = [];

    /**
     * Set the page title.
     */
    public static function setTitle(string $title, bool $appendSuffix = true): void
    {
        $suffix = $appendSuffix ? ' | Yanto Shoes Bali' : '';
        static::$meta['title'] = $title . $suffix;
        static::$og['og:title'] = $title . $suffix;
        static::$twitter['twitter:title'] = $title . $suffix;
    }

    /**
     * Set the page meta description.
     */
    public static function setDescription(string $description): void
    {
        static::$meta['description'] = $description;
        static::$og['og:description'] = $description;
        static::$twitter['twitter:description'] = $description;
    }

    /**
     * Set the page canonical URL.
     */
    public static function setUrl(string $url): void
    {
        static::$meta['canonical'] = $url;
        static::$og['og:url'] = $url;
        static::$twitter['twitter:url'] = $url;
    }

    /**
     * Set the Open Graph image.
     */
    public static function setImage(string $imageUrl): void
    {
        static::$og['og:image'] = $imageUrl;
        static::$twitter['twitter:image'] = $imageUrl;
    }

    /**
     * Set Open Graph type (default: website).
     */
    public static function setType(string $type = 'website'): void
    {
        static::$og['og:type'] = $type;
    }

    /**
     * Set keywords meta tag.
     */
    public static function setKeywords(string $keywords): void
    {
        static::$meta['keywords'] = $keywords;
    }

    /**
     * Add JSON-LD structured data block.
     */
    public static function addJsonLd(array $data): void
    {
        static::$jsonLd[] = $data;
    }

    /**
     * Render all meta tags.
     */
    public static function renderMeta(): string
    {
        $html = '';

        // Title
        if (!empty(static::$meta['title'])) {
            $html .= '<title>' . e(static::$meta['title']) . '</title>' . "\n";
        }

        // Description
        if (!empty(static::$meta['description'])) {
            $html .= '<meta name="description" content="' . e(static::$meta['description']) . '" />' . "\n";
        }

        // Keywords
        if (!empty(static::$meta['keywords'])) {
            $html .= '<meta name="keywords" content="' . e(static::$meta['keywords']) . '" />' . "\n";
        }

        // Canonical
        if (!empty(static::$meta['canonical'])) {
            $html .= '<link rel="canonical" href="' . e(static::$meta['canonical']) . '" />' . "\n";
        }

        return $html;
    }

    /**
     * Render Open Graph tags.
     */
    public static function renderOpenGraph(): string
    {
        $html = '';

        // Defaults
        $defaults = [
            'og:type' => 'website',
            'og:site_name' => 'Yanto Shoes Bali',
            'og:locale' => 'en_US',
        ];

        $og = array_merge($defaults, static::$og);

        foreach ($og as $property => $content) {
            if (!empty($content)) {
                $html .= '<meta property="' . e($property) . '" content="' . e($content) . '" />' . "\n";
            }
        }

        return $html;
    }

    /**
     * Render Twitter Card tags.
     */
    public static function renderTwitterCard(): string
    {
        $html = '';

        $defaults = [
            'twitter:card' => 'summary_large_image',
            'twitter:site' => '@yantoshoes_bali',
        ];

        $twitter = array_merge($defaults, static::$twitter);

        foreach ($twitter as $name => $content) {
            if (!empty($content)) {
                $html .= '<meta name="' . e($name) . '" content="' . e($content) . '" />' . "\n";
            }
        }

        return $html;
    }

    /**
     * Render JSON-LD structured data.
     */
    public static function renderJsonLd(): string
    {
        if (empty(static::$jsonLd)) {
            return '';
        }

        $html = '';
        foreach (static::$jsonLd as $data) {
            $html .= '<script type="application/ld+json">' . "\n";
            $html .= json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            $html .= "\n</script>\n";
        }

        return $html;
    }

    /**
     * Render all SEO output (meta + OG + Twitter + JSON-LD).
     */
    public static function render(): string
    {
        return static::renderMeta()
            . static::renderOpenGraph()
            . static::renderTwitterCard()
            . static::renderJsonLd();
    }

    /**
     * Reset all data (useful for testing).
     */
    public static function reset(): void
    {
        static::$meta = [];
        static::$og = [];
        static::$twitter = [];
        static::$jsonLd = [];
    }
}
