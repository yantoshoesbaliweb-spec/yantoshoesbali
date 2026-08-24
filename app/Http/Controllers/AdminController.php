<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard with rich mock data.
     */
    public function dashboard()
    {
        $stats = [
            'total_inquiries' => 128,
            'active_orders' => 18,
            'boot_models' => 12,
            'store_outlets' => 3,
            'revenue_estimate' => 'Rp 86.4M',
            'growth_rate' => '+24.5%'
        ];

        $recentInquiries = [
            [
                'id' => 'INQ-1048',
                'customer' => 'Sarah Jenkins',
                'origin' => 'Sydney, Australia',
                'country_code' => 'AU',
                'flag' => '🇦🇺',
                'model' => 'Classic Tan Cowboy Boots',
                'type' => 'Custom Sizing',
                'date' => '24 Aug 2026, 08:15',
                'status' => 'In Production',
                'status_class' => 'bg-warning text-dark',
                'phone' => '+61 412 345 678',
            ],
            [
                'id' => 'INQ-1047',
                'customer' => 'Marcus O\'Connor',
                'origin' => 'London, UK',
                'country_code' => 'GB',
                'flag' => '🇬🇧',
                'model' => 'Midnight Black Flame Boots',
                'type' => 'Ready Model',
                'date' => '24 Aug 2026, 07:30',
                'status' => 'Shipped (DHL)',
                'status_class' => 'bg-info text-white',
                'phone' => '+44 7700 900077',
            ],
            [
                'id' => 'INQ-1046',
                'customer' => 'Emma Laurent',
                'origin' => 'Los Angeles, USA',
                'country_code' => 'US',
                'flag' => '🇺🇸',
                'model' => 'Ivory Dream Floral Embroidered',
                'type' => 'Bespoke Design',
                'date' => '23 Aug 2026, 21:40',
                'status' => 'Consulting',
                'status_class' => 'bg-primary text-white',
                'phone' => '+1 310 555 0192',
            ],
            [
                'id' => 'INQ-1045',
                'customer' => 'Lukas Meyer',
                'origin' => 'Munich, Germany',
                'country_code' => 'DE',
                'flag' => '🇩🇪',
                'model' => 'Scarlet Flame Cowboy Boots',
                'type' => 'Custom Sizing',
                'date' => '23 Aug 2026, 18:20',
                'status' => 'Completed',
                'status_class' => 'bg-success text-white',
                'phone' => '+49 89 123456',
            ],
            [
                'id' => 'INQ-1044',
                'customer' => 'Chloe & Victor',
                'origin' => 'Amsterdam, Netherlands',
                'country_code' => 'NL',
                'flag' => '🇳🇱',
                'model' => 'Bespoke Wedding Western Pair',
                'type' => 'Couple Set',
                'date' => '23 Aug 2026, 15:10',
                'status' => 'In Production',
                'status_class' => 'bg-warning text-dark',
                'phone' => '+31 20 123 4567',
            ],
        ];

        $popularBoots = [
            [
                'name' => 'Classic Tan Cowboy Boots',
                'category' => 'Heritage Classic',
                'image' => 'images/product_tan.png',
                'orders_count' => 48,
                'rating' => 5.0,
                'status' => 'Best Seller'
            ],
            [
                'name' => 'Midnight Black Flame Boots',
                'category' => 'Dark Artisan',
                'image' => 'images/product_black.png',
                'orders_count' => 36,
                'rating' => 4.9,
                'status' => 'High Demand'
            ],
            [
                'name' => 'Ivory Dream Floral Embroidered',
                'category' => 'Boho Romantic',
                'image' => 'images/product_cream.png',
                'orders_count' => 29,
                'rating' => 5.0,
                'status' => 'Trending'
            ],
            [
                'name' => 'Scarlet Flame Cowboy Boots',
                'category' => 'Statement Western',
                'image' => 'images/product_red.png',
                'orders_count' => 22,
                'rating' => 4.8,
                'status' => 'Limited Leather'
            ]
        ];

        $stores = [
            ['name' => 'Legian Flagship Store', 'location' => 'Jl. Legian No. 388, Kuta', 'status' => 'Open Daily 10:00 - 18:00', 'badge' => 'Flagship'],
            ['name' => 'Canggu Store Hub', 'location' => 'Jl. Pantai Batu Bolong No. 11a', 'status' => 'Open Daily 10:00 - 18:00', 'badge' => 'Canggu Hub'],
            ['name' => 'Uluwatu Clifftop Store', 'location' => 'Jl. Labuansait No. 12, Pecatu', 'status' => 'Open Daily 10:00 - 18:00', 'badge' => 'Clifftop'],
        ];

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'popularBoots', 'stores'));
    }

    /**
     * Display the boot products catalog management view.
     */
    public function products()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Classic Tan Cowboy Boots',
                'series' => 'Heritage Classic Series',
                'category' => 'Classic',
                'image' => 'images/product_tan.png',
                'leather' => 'Full Grain Cowhide (Tan Oil Pull-up)',
                'turnaround' => '6-7 Days',
                'badge' => 'Best Seller',
                'badge_class' => 'bg-warning text-dark',
                'status' => 'Active',
            ],
            [
                'id' => 2,
                'name' => 'Midnight Black Flame Boots',
                'series' => 'Dark Artisan Series',
                'category' => 'Classic',
                'image' => 'images/product_black.png',
                'leather' => 'Full Grain Black Aniline Leather',
                'turnaround' => '6-7 Days',
                'badge' => 'Popular',
                'badge_class' => 'bg-dark text-white',
                'status' => 'Active',
            ],
            [
                'id' => 3,
                'name' => 'Ivory Dream Floral Embroidered',
                'series' => 'Boho Romance Series',
                'category' => 'Bohemian',
                'image' => 'images/product_cream.png',
                'leather' => 'Supple Cream Nappa Leather',
                'turnaround' => '7-10 Days',
                'badge' => 'New Arrival',
                'badge_class' => 'bg-success text-white',
                'status' => 'Active',
            ],
            [
                'id' => 4,
                'name' => 'Scarlet Flame Cowboy Boots',
                'series' => 'Statement Western Series',
                'category' => 'Bold',
                'image' => 'images/product_red.png',
                'leather' => 'Crimson Full Grain & Contrast Inlay',
                'turnaround' => '7-10 Days',
                'badge' => 'Bold Edition',
                'badge_class' => 'bg-danger text-white',
                'status' => 'Active',
            ],
            [
                'id' => 5,
                'name' => 'Vintage Havana Brown Boots',
                'series' => 'Heritage Classic Series',
                'category' => 'Classic',
                'image' => 'images/product_tan.png',
                'leather' => 'Waxed Distressed Havana Leather',
                'turnaround' => '6-7 Days',
                'badge' => 'Classic',
                'badge_class' => 'bg-secondary text-white',
                'status' => 'Active',
            ],
            [
                'id' => 6,
                'name' => 'Obsidian Night Rider Boots',
                'series' => 'Dark Artisan Series',
                'category' => 'Bold',
                'image' => 'images/product_black.png',
                'leather' => 'Matte Jet-Black Bullhide',
                'turnaround' => '7-8 Days',
                'badge' => 'Heavy Duty',
                'badge_class' => 'bg-dark text-white',
                'status' => 'Active',
            ],
            [
                'id' => 7,
                'name' => 'Desert Sand Suede Western',
                'series' => 'Boho Romance Series',
                'category' => 'Bohemian',
                'image' => 'images/product_cream.png',
                'leather' => 'Velvety Tan Calf Suede',
                'turnaround' => '6-7 Days',
                'badge' => 'Suede',
                'badge_class' => 'bg-info text-white',
                'status' => 'Active',
            ],
            [
                'id' => 8,
                'name' => 'Royal Cognac Heritage Boots',
                'series' => 'Heritage Classic Series',
                'category' => 'Premium',
                'image' => 'images/product_tan.png',
                'leather' => 'French Calfskin Cognac Brown',
                'turnaround' => '7-10 Days',
                'badge' => 'Premium',
                'badge_class' => 'bg-warning text-dark',
                'status' => 'Active',
            ],
            [
                'id' => 9,
                'name' => 'Dusty Rose Boho Western',
                'series' => 'Boho Romance Series',
                'category' => 'Bohemian',
                'image' => 'images/product_cream.png',
                'leather' => 'Blush Full Grain Leather',
                'turnaround' => '7-10 Days',
                'badge' => 'Boho',
                'badge_class' => 'bg-success text-white',
                'status' => 'Active',
            ],
            [
                'id' => 10,
                'name' => 'Rustic Chestnut Work Western',
                'series' => 'Heritage Classic Series',
                'category' => 'Classic',
                'image' => 'images/product_tan.png',
                'leather' => 'Oiled Roughout Chestnut Leather',
                'turnaround' => '6-7 Days',
                'badge' => 'Durable',
                'badge_class' => 'bg-secondary text-white',
                'status' => 'Active',
            ],
            [
                'id' => 11,
                'name' => 'Viper Ember Textured Boots',
                'series' => 'Statement Western Series',
                'category' => 'Bold',
                'image' => 'images/product_red.png',
                'leather' => 'Embossed Scale Texture & Cowhide',
                'turnaround' => '8-10 Days',
                'badge' => 'Textured',
                'badge_class' => 'bg-danger text-white',
                'status' => 'Active',
            ],
            [
                'id' => 12,
                'name' => 'Platinum Eclipse Dress Boots',
                'series' => 'Dark Artisan Series',
                'category' => 'Premium',
                'image' => 'images/product_black.png',
                'leather' => 'Polished Black Boxcalf',
                'turnaround' => '7-10 Days',
                'badge' => 'Formal Western',
                'badge_class' => 'bg-dark text-white',
                'status' => 'Active',
            ],
        ];

        return view('admin.products', compact('products'));
    }

    /**
     * Display the orders and custom inquiries tracking view.
     */
    public function orders()
    {
        $orders = [
            [
                'id' => 'INQ-1048',
                'customer' => 'Sarah Jenkins',
                'email' => 'sarah.j@sydney.com.au',
                'phone' => '+61 412 345 678',
                'origin' => 'Sydney, Australia 🇦🇺',
                'model' => 'Classic Tan Cowboy Boots',
                'custom_notes' => 'Size EU 38, Wide calf (+2cm), Dark brown contrast stitching on shaft.',
                'date' => '24 Aug 2026, 08:15',
                'channel' => 'WhatsApp Legian',
                'status' => 'In Production',
                'status_class' => 'bg-warning text-dark',
                'est_completion' => '29 Aug 2026',
            ],
            [
                'id' => 'INQ-1047',
                'customer' => 'Marcus O\'Connor',
                'email' => 'm.oconnor@london.co.uk',
                'phone' => '+44 7700 900077',
                'origin' => 'London, UK 🇬🇧',
                'model' => 'Midnight Black Flame Boots',
                'custom_notes' => 'Standard EU 43, Picked up at Legian outlet before flight.',
                'date' => '24 Aug 2026, 07:30',
                'channel' => 'In-Store Walkin',
                'status' => 'Shipped (DHL)',
                'status_class' => 'bg-info text-white',
                'est_completion' => 'Delivered',
            ],
            [
                'id' => 'INQ-1046',
                'customer' => 'Emma Laurent',
                'email' => 'emma.laurent@california.com',
                'phone' => '+1 310 555 0192',
                'origin' => 'Los Angeles, USA 🇺🇸',
                'model' => 'Ivory Dream Floral Embroidered',
                'custom_notes' => 'Custom embroidery pattern provided via WhatsApp photo reference.',
                'date' => '23 Aug 2026, 21:40',
                'channel' => 'Instagram DM / WA',
                'status' => 'Consulting',
                'status_class' => 'bg-primary text-white',
                'est_completion' => 'Pending Confirmation',
            ],
            [
                'id' => 'INQ-1045',
                'customer' => 'Lukas Meyer',
                'email' => 'lukas.meyer@munich.de',
                'phone' => '+49 89 123456',
                'origin' => 'Munich, Germany 🇩🇪',
                'model' => 'Scarlet Flame Cowboy Boots',
                'custom_notes' => 'Size EU 42, Insole measurement: 27.2cm, Extra arch support.',
                'date' => '23 Aug 2026, 18:20',
                'channel' => 'WhatsApp Uluwatu',
                'status' => 'Completed',
                'status_class' => 'bg-success text-white',
                'est_completion' => 'Completed',
            ],
            [
                'id' => 'INQ-1044',
                'customer' => 'Chloe & Victor',
                'email' => 'chloe.victor@amsterdam.nl',
                'phone' => '+31 20 123 4567',
                'origin' => 'Amsterdam, Netherlands 🇳🇱',
                'model' => 'Bespoke Wedding Western Pair',
                'custom_notes' => 'Custom laser engraved wedding initials "C & V" on pull-straps.',
                'date' => '23 Aug 2026, 15:10',
                'channel' => 'WhatsApp Custom',
                'status' => 'In Production',
                'status_class' => 'bg-warning text-dark',
                'est_completion' => '30 Aug 2026',
            ],
            [
                'id' => 'INQ-1043',
                'customer' => 'David Fontaine',
                'email' => 'd.fontaine@paris.fr',
                'phone' => '+33 1 42 68 55 00',
                'origin' => 'Paris, France 🇫🇷',
                'model' => 'Classic Tan Low-Cut Boot',
                'custom_notes' => 'Low cut ankle height, vibram rubber half-sole upgrade.',
                'date' => '22 Aug 2026, 11:00',
                'channel' => 'Website Inquiry',
                'status' => 'Completed',
                'status_class' => 'bg-success text-white',
                'est_completion' => 'Completed',
            ],
        ];

        return view('admin.orders', compact('orders'));
    }
}
