<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
            'boot_models' => Product::count(),
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

        $popularBoots = Product::active()->ordered()->take(4)->get()->map(function ($p) {
            return [
                'name' => $p->name,
                'category' => $p->series ?? $p->category,
                'image' => $p->image,
                'orders_count' => rand(20, 50),
                'rating' => round(rand(45, 50) / 10, 1),
                'status' => $p->badge,
            ];
        })->toArray();

        // Fallback if no products in DB yet
        if (empty($popularBoots)) {
            $popularBoots = [
                ['name' => 'Classic Tan Cowboy Boots', 'category' => 'Heritage Classic', 'image' => 'images/product_tan.png', 'orders_count' => 48, 'rating' => 5.0, 'status' => 'Best Seller'],
                ['name' => 'Midnight Black Flame Boots', 'category' => 'Dark Artisan', 'image' => 'images/product_black.png', 'orders_count' => 36, 'rating' => 4.9, 'status' => 'High Demand'],
                ['name' => 'Ivory Dream Floral Embroidered', 'category' => 'Boho Romantic', 'image' => 'images/product_cream.png', 'orders_count' => 29, 'rating' => 5.0, 'status' => 'Trending'],
                ['name' => 'Scarlet Flame Cowboy Boots', 'category' => 'Statement Western', 'image' => 'images/product_red.png', 'orders_count' => 22, 'rating' => 4.8, 'status' => 'Limited Leather'],
            ];
        }

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
        $products = Product::ordered()->get();
        return view('admin.products', compact('products'));
    }

    /**
     * Store a new product.
     */
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'series' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'leather' => 'nullable|string|max:255',
            'turnaround' => 'nullable|string|max:100',
            'badge' => 'nullable|string|max:100',
            'badge_class' => 'nullable|string|max:100',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'image' => 'nullable|string|max:255',
        ]);

        $data = $request->except(['_token', 'image_file']);

        // Handle image upload
        if ($request->hasFile('image_file') && $request->file('image_file')->isValid()) {
            $file = $request->file('image_file');
            $filename = 'product_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $storedPath = $file->storeAs('products', $filename, 'public');
            $data['image'] = 'storage/' . $storedPath;
        }

        $data['sort_order'] = Product::max('sort_order') + 1;
        $data['status'] = $data['status'] ?? 'Active';

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Boot model added successfully!');
    }

    /**
     * Update an existing product.
     */
    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'series' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'leather' => 'nullable|string|max:255',
            'turnaround' => 'nullable|string|max:100',
            'badge' => 'nullable|string|max:100',
            'badge_class' => 'nullable|string|max:100',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'image' => 'nullable|string|max:255',
        ]);

        $data = $request->except(['_token', '_method', 'image_file']);

        // Handle image upload
        if ($request->hasFile('image_file') && $request->file('image_file')->isValid()) {
            $file = $request->file('image_file');
            $filename = 'product_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $storedPath = $file->storeAs('products', $filename, 'public');
            $data['image'] = 'storage/' . $storedPath;
        }

        $product->update($data);

        return redirect()->route('admin.products')->with('success', 'Boot model "' . $product->name . '" updated successfully!');
    }

    /**
     * Delete a product.
     */
    public function deleteProduct(Product $product)
    {
        $name = $product->name;
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Boot model "' . $name . '" deleted successfully!');
    }

    /**
     * Toggle product status (Active/Inactive).
     */
    public function toggleProductStatus(Product $product)
    {
        $product->status = $product->status === 'Active' ? 'Inactive' : 'Active';
        $product->save();
        return redirect()->route('admin.products')->with('success', '"' . $product->name . '" is now ' . $product->status . '.');
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
