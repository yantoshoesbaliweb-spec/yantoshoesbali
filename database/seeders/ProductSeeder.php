<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Seed the products table with the 12 signature boot models.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Classic Tan Cowboy Boots',
                'series' => 'Heritage Classic Series',
                'category' => 'Classic',
                'image' => 'images/product_tan.png',
                'leather' => 'Full Grain Cowhide (Tan Oil Pull-up)',
                'turnaround' => '6-7 Days',
                'badge' => 'Best Seller',
                'badge_class' => 'bg-warning text-dark',
                'status' => 'Active',
                'sort_order' => 1,
            ],
            [
                'name' => 'Midnight Black Flame Boots',
                'series' => 'Dark Artisan Series',
                'category' => 'Classic',
                'image' => 'images/product_black.png',
                'leather' => 'Full Grain Black Aniline Leather',
                'turnaround' => '6-7 Days',
                'badge' => 'Popular',
                'badge_class' => 'bg-dark text-white',
                'status' => 'Active',
                'sort_order' => 2,
            ],
            [
                'name' => 'Ivory Dream Floral Embroidered',
                'series' => 'Boho Romance Series',
                'category' => 'Bohemian',
                'image' => 'images/product_cream.png',
                'leather' => 'Supple Cream Nappa Leather',
                'turnaround' => '7-10 Days',
                'badge' => 'New Arrival',
                'badge_class' => 'bg-success text-white',
                'status' => 'Active',
                'sort_order' => 3,
            ],
            [
                'name' => 'Scarlet Flame Cowboy Boots',
                'series' => 'Statement Western Series',
                'category' => 'Bold',
                'image' => 'images/product_red.png',
                'leather' => 'Crimson Full Grain & Contrast Inlay',
                'turnaround' => '7-10 Days',
                'badge' => 'Bold Edition',
                'badge_class' => 'bg-danger text-white',
                'status' => 'Active',
                'sort_order' => 4,
            ],
            [
                'name' => 'Vintage Havana Brown Boots',
                'series' => 'Heritage Classic Series',
                'category' => 'Classic',
                'image' => 'images/product_tan.png',
                'leather' => 'Waxed Distressed Havana Leather',
                'turnaround' => '6-7 Days',
                'badge' => 'Classic',
                'badge_class' => 'bg-secondary text-white',
                'status' => 'Active',
                'sort_order' => 5,
            ],
            [
                'name' => 'Obsidian Night Rider Boots',
                'series' => 'Dark Artisan Series',
                'category' => 'Bold',
                'image' => 'images/product_black.png',
                'leather' => 'Matte Jet-Black Bullhide',
                'turnaround' => '7-8 Days',
                'badge' => 'Heavy Duty',
                'badge_class' => 'bg-dark text-white',
                'status' => 'Active',
                'sort_order' => 6,
            ],
            [
                'name' => 'Desert Sand Suede Western',
                'series' => 'Boho Romance Series',
                'category' => 'Bohemian',
                'image' => 'images/product_cream.png',
                'leather' => 'Velvety Tan Calf Suede',
                'turnaround' => '6-7 Days',
                'badge' => 'Suede',
                'badge_class' => 'bg-info text-white',
                'status' => 'Active',
                'sort_order' => 7,
            ],
            [
                'name' => 'Royal Cognac Heritage Boots',
                'series' => 'Heritage Classic Series',
                'category' => 'Premium',
                'image' => 'images/product_tan.png',
                'leather' => 'French Calfskin Cognac Brown',
                'turnaround' => '7-10 Days',
                'badge' => 'Premium',
                'badge_class' => 'bg-warning text-dark',
                'status' => 'Active',
                'sort_order' => 8,
            ],
            [
                'name' => 'Dusty Rose Boho Western',
                'series' => 'Boho Romance Series',
                'category' => 'Bohemian',
                'image' => 'images/product_cream.png',
                'leather' => 'Blush Full Grain Leather',
                'turnaround' => '7-10 Days',
                'badge' => 'Boho',
                'badge_class' => 'bg-success text-white',
                'status' => 'Active',
                'sort_order' => 9,
            ],
            [
                'name' => 'Rustic Chestnut Work Western',
                'series' => 'Heritage Classic Series',
                'category' => 'Classic',
                'image' => 'images/product_tan.png',
                'leather' => 'Oiled Roughout Chestnut Leather',
                'turnaround' => '6-7 Days',
                'badge' => 'Durable',
                'badge_class' => 'bg-secondary text-white',
                'status' => 'Active',
                'sort_order' => 10,
            ],
            [
                'name' => 'Viper Ember Textured Boots',
                'series' => 'Statement Western Series',
                'category' => 'Bold',
                'image' => 'images/product_red.png',
                'leather' => 'Embossed Scale Texture & Cowhide',
                'turnaround' => '8-10 Days',
                'badge' => 'Textured',
                'badge_class' => 'bg-danger text-white',
                'status' => 'Active',
                'sort_order' => 11,
            ],
            [
                'name' => 'Platinum Eclipse Dress Boots',
                'series' => 'Dark Artisan Series',
                'category' => 'Premium',
                'image' => 'images/product_black.png',
                'leather' => 'Polished Black Boxcalf',
                'turnaround' => '7-10 Days',
                'badge' => 'Formal Western',
                'badge_class' => 'bg-dark text-white',
                'status' => 'Active',
                'sort_order' => 12,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}
