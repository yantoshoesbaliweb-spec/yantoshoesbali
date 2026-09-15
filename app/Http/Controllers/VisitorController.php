<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Product;
use App\Models\ShoeToe;
use App\Models\Leather;
use App\Helpers\SeoHelper;

class VisitorController extends Controller
{
    /**
     * Display the home page for visitors with dynamic content from database.
     */
    public function home()
    {
        $headerContent = Content::getByKey('header');
        $storyContent = Content::getByKey('story');
        $visionContent = Content::getByKey('vision');
        $testimonies = Content::getByKey('testimonies');
        $contact = Content::getByKey('contact');
        $storesContent = Content::getByKey('stores');
        $shoeToes = \Illuminate\Support\Facades\Cache::rememberForever('shoe_toes_all', function () {
            return ShoeToe::orderBy('sort_order')->orderBy('id')->get();
        });
        
        $leathers = \Illuminate\Support\Facades\Cache::rememberForever('leathers_all', function () {
            return Leather::orderBy('sort_order')->orderBy('id')->get();
        });

        // SEO Meta Tags
        SeoHelper::reset();
        SeoHelper::setTitle('Handcrafted Genuine Leather Cowboy Boots, Made in Bali', false);
        SeoHelper::setDescription('Discover handcrafted genuine leather cowboy boots made in Bali since 1990. Custom made to order in 7 days, retail and wholesale. Legian, Canggu, Uluwatu.');
        SeoHelper::setUrl(route('visitor.home'));
        SeoHelper::setImage(asset('images/hero_boots.png'));
        SeoHelper::setKeywords('custom shoes bali, cowboy shoes, shoes bali, cowboy boots bali, handcrafted leather boots, yanto shoes bali, custom cowboy boots, genuine leather boots, bali boots, western boots bali, handmade boots indonesia');
        SeoHelper::setType('website');

        // JSON-LD: LocalBusiness
        SeoHelper::addJsonLd([
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => 'Yanto Shoes Bali',
            'description' => 'Handcrafted genuine leather cowboy boots made in Bali since 1990. Custom made to order in 7 days.',
            'url' => route('visitor.home'),
            'logo' => asset('images/yanto-logo.png'),
            'image' => asset('images/hero_boots.png'),
            'telephone' => $contact['phone'] ?? '+62 813 5305 5475',
            'email' => $contact['email'] ?? 'info@yantoshoesbali.com',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Jl. Legian No. 388',
                'addressLocality' => 'Kuta',
                'addressRegion' => 'Bali',
                'postalCode' => '80361',
                'addressCountry' => 'ID',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => -8.7184,
                'longitude' => 115.1686,
            ],
            'openingHoursSpecification' => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                'opens' => '10:00',
                'closes' => '18:00',
            ],
            'sameAs' => array_values(array_filter([
                $contact['facebook'] ?? 'https://facebook.com/yantoshoesbali',
                $contact['instagram'] ?? 'https://www.instagram.com/yantoshoes_bali/',
                $contact['tiktok'] ?? 'https://www.tiktok.com/@yantoshoesbali',
            ])),
            'priceRange' => '$$',
            'foundingDate' => '1990',
        ]);

        return view('visitor.home', compact(
            'headerContent', 'storyContent', 'visionContent',
            'testimonies', 'contact', 'storesContent',
            'shoeToes', 'leathers'
        ));
    }

    /**
     * Display the boot catalog page for visitors.
     */
    public function catalog()
    {
        $products = \Illuminate\Support\Facades\Cache::rememberForever('products_active', function () {
            return Product::with(['categoryRelation', 'images'])->active()->ordered()->get();
        });
        
        $contact = Content::getByKey('contact');

        // SEO Meta Tags
        SeoHelper::reset();
        SeoHelper::setTitle('Handcrafted Boots Catalog');
        SeoHelper::setDescription('Browse our full catalog of handcrafted genuine leather cowboy boots. Classic, Bohemian, Bold, and Premium series. Made in Bali, shipped worldwide.');
        SeoHelper::setUrl(route('visitor.catalog'));
        SeoHelper::setImage(asset('images/hero_boots.png'));
        SeoHelper::setKeywords('cowboy boots catalog, leather boots collection, western boots, handmade boots bali, yanto shoes catalog');
        SeoHelper::setType('website');

        // JSON-LD: ItemList for catalog
        $itemList = [];
        foreach ($products as $idx => $product) {
            $itemList[] = [
                '@type' => 'ListItem',
                'position' => $idx + 1,
                'item' => [
                    '@type' => 'Product',
                    'name' => $product->name,
                    'description' => ($product->series ? $product->series . ' — ' : '') . ($product->leather ?? 'Genuine Leather'),
                    'image' => asset($product->image),
                    'brand' => [
                        '@type' => 'Brand',
                        'name' => 'Yanto Shoes Bali',
                    ],
                    'category' => $product->categoryRelation->name ?? null,
                ],
            ];
        }

        if (!empty($itemList)) {
            SeoHelper::addJsonLd([
                '@context' => 'https://schema.org',
                '@type' => 'ItemList',
                'name' => 'Yanto Shoes Bali - Handcrafted Boots Catalog',
                'numberOfItems' => count($itemList),
                'itemListElement' => $itemList,
            ]);
        }

        return view('visitor.catalog', compact('products', 'contact'));
    }
}
