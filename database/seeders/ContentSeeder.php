<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Header Slider & Announcement Content
        Content::updateOrCreate(
            ['key' => 'header'],
            [
                'content' => [
                    'announcements' => [
                        'FOLLOW US @YANTOSHOES_BALI • BEST COWBOY BOOTS IN BALI',
                        'FREE CONSULTATION • CUSTOM MADE TO ORDER IN 7 DAYS',
                        'LEGIAN | CANGGU | ULUWATU • OPEN DAILY 10AM - 6PM',
                        'WORLDWIDE EXPRESS SHIPPING AVAILABLE ON ALL ORDERS',
                    ],
                    'slides' => [
                        [
                            'subtitle' => 'Made in Bali • Genuine Leather',
                            'title' => 'YANTO SHOES',
                            'title_highlight' => 'BALI',
                            'description' => 'Handcrafted Cowboy Boots — Made by master artisans, from genuine leather, crafted exclusively for you.',
                            'btn_primary_text' => 'Explore Catalog',
                            'btn_primary_link' => '/catalog',
                            'btn_secondary_text' => 'Custom Order',
                            'btn_secondary_link' => '#custom',
                            'image' => 'images/hero_boots.png',
                        ],
                        [
                            'subtitle' => 'Latest Catalog',
                            'title' => 'AUTHENTIC',
                            'title_highlight' => 'COLLECTION',
                            'description' => 'Hundreds of classic and modern styles available. Visit our stores in Legian, Canggu, and Uluwatu.',
                            'btn_primary_text' => 'View Full Catalog',
                            'btn_primary_link' => '/catalog',
                            'btn_secondary_text' => '',
                            'btn_secondary_link' => '',
                            'image' => 'images/collection.png',
                        ],
                        [
                            'subtitle' => 'Master Craftsmanship',
                            'title' => 'CRAFTED WITH',
                            'title_highlight' => 'HEART & SOUL',
                            'description' => 'Every stitch is a testament to 35+ years of Balinese leather heritage.',
                            'btn_primary_text' => 'Our Story',
                            'btn_primary_link' => '#about',
                            'btn_secondary_text' => '',
                            'btn_secondary_link' => '',
                            'image' => 'images/craftsmanship.png',
                        ],
                    ],
                    'marquee' => [
                        '100% GENUINE LEATHER',
                        'CUSTOM MADE IN 7 DAYS',
                        'BALI MASTER ARTISANS',
                        'RETAIL & WHOLESALE',
                        'WORLDWIDE SHIPPING',
                        'LEGIAN • CANGGU • ULUWATU',
                        'ESTABLISHED 1990',
                    ],
                ],
            ]
        );

        // 2. Story Narrative Section Content
        Content::updateOrCreate(
            ['key' => 'story'],
            [
                'content' => [
                    'eyebrow' => 'YANTO SHOES BALI',
                    'title' => 'A Legacy of Craftsmanship',
                    'title_highlight' => 'Since 1990',
                    'badge_year' => 'Est. 1990',
                    'badge_sub' => 'Bali Heritage',
                    'image' => 'images/yanto-header.jpeg',
                    'lead_text' => 'It all began with a craftsman named Mr Yanto.',
                    'paragraphs' => [
                        'In 1987, Mr Yanto began his journey as a Leather Shoes craftsman in Bali. That same year, he was entrusted with producing thousands of pairs of Hells shoes made from sponge material for an Asian company. This experience became an important foundation in developing his skills, craftsmanship and distinctive character.',
                        'In 1990, after three years of refining his craft, Mr Yanto established his own brand, Yanto Shoes Bali, first opening its doors on Jl Legian, Bali.',
                        'What began as a small business built by hand and driven by dedication has continued to grow while staying true to its original character: authentic, distinctive and timeless cowboy-inspired footwear.',
                        'More than just footwear, every pair of Yanto Shoes Bali carries decades of experience, skill and dedication to craftsmanship.',
                        'Today, Yanto Shoes Bali has three locations across Bali — Legian, Canggu and Uluwatu — along with its own production workshop.',
                    ],
                    'values_intro' => 'After more than three decades, the values established by Mr Yanto remain at the heart of the brand:',
                    'values_items' => [
                        'Crafted with Experience.',
                        'Built with Character.',
                        'Crafted by Skilled Hands.',
                    ],
                    'tagline' => 'Yanto Shoes Bali — A Legacy of Cowboy Craftsmanship.',
                    'pills' => [
                        ['num' => '35+', 'text' => 'Years Mastery'],
                        ['num' => '3', 'text' => 'Bali Store Outlets'],
                        ['num' => '100%', 'text' => 'Genuine Leather'],
                        ['num' => 'Workshop', 'text' => 'Own Production'],
                    ],
                ],
            ]
        );

        // 3. Vision / Bespoke Custom Order Section Content
        Content::updateOrCreate(
            ['key' => 'vision'],
            [
                'content' => [
                    'eyebrow' => 'Bespoke Custom Orders',
                    'title' => 'Your Vision,',
                    'title_highlight' => 'Our Craftsmanship',
                    'description' => 'Looking for a specific heel height, exotic leather finish, or unique custom embroidery? Let our master artisans create your dream boots tailored to your exact measurements in just 7 days.',
                    'image' => 'images/craftsmanship.png',
                    'features' => [
                        [
                            'title' => 'Free Consultation:',
                            'desc' => 'Send us your reference photos, drawings, or ideas.',
                        ],
                        [
                            'title' => 'Premium Leather Selection:',
                            'desc' => 'Choose from cowhide, suede, burnished leather, and more.',
                        ],
                        [
                            'title' => 'Handmade in 7 Days:',
                            'desc' => 'Expertly shaped, welted, and finished by Balinese artisans.',
                        ],
                        [
                            'title' => 'Global Delivery:',
                            'desc' => 'In-store pickup across Bali or worldwide door-to-door courier.',
                        ],
                    ],
                    'cta_text' => 'Start Custom Consultation',
                    'cta_link' => 'https://wa.me/6281353055475?text=Hi%20Yanto%20Shoes%20Bali%2C%20I%20would%20like%20to%20consult%20about%20a%20custom%20order',
                ],
            ]
        );
    }
}
