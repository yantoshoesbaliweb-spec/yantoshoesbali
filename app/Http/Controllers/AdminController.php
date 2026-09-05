<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ShoeToe;
use App\Models\Leather;
use App\Models\VisitorLog;
use App\Services\MediaService;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard with real-time date/time, visitor traffic metrics, and product totals.
     */
    public function dashboard()
    {
        $now = Carbon::now();
        $dayName = $now->locale('id')->translatedFormat('l');
        $dateFormatted = $now->locale('id')->translatedFormat('d F Y');
        $timeFormatted = $now->format('H:i:s');

        $visitorMetrics = VisitorLog::getMetrics();
        $totalProducts = Product::count();
        $activeProducts = Product::active()->count();

        $recentProducts = Product::with('images', 'categoryRelation')->ordered()->take(6)->get();

        return view('admin.dashboard', compact(
            'now',
            'dayName',
            'dateFormatted',
            'timeFormatted',
            'visitorMetrics',
            'totalProducts',
            'activeProducts',
            'recentProducts'
        ));
    }

    /**
     * Display the boot products catalog management view.
     */
    public function products()
    {
        $products = Product::with('images', 'categoryRelation')->ordered()->get();
        return view('admin.products', compact('products'));
    }

    /**
     * Show form to create a new product.
     */
    public function createProduct()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.product-form', [
            'product' => null,
            'categories' => $categories,
        ]);
    }

    /**
     * Show form to edit an existing product.
     */
    public function editProduct(Product $product)
    {
        $product->load('images');
        $categories = Category::orderBy('name')->get();
        return view('admin.product-form', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a new product.
     */
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'series' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'leather' => 'nullable|string|max:255',
            'turnaround' => 'nullable|string|max:100',
            'image_files' => 'nullable|array|max:10',
            'image_files.*' => 'image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $data = $request->only(['name', 'series', 'category_id', 'leather', 'turnaround']);
        $data['sort_order'] = Product::max('sort_order') + 1;
        $data['status'] = 'Active';


        $product = Product::create($data);

        // Handle multiple image uploads
        if ($request->hasFile('image_files')) {
            $sortOrder = 0;
            foreach ($request->file('image_files') as $file) {
                if ($file->isValid()) {
                    $filename = 'product_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $storedPath = $file->storeAs('products', $filename, 'public');
                    $imagePath = 'storage/' . $storedPath;

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                        'sort_order' => $sortOrder++,
                    ]);

                    // Set first image as the product's main image
                    if ($sortOrder === 1) {
                        $product->update(['image' => $imagePath]);
                    }
                }
            }
        }

        return redirect()->route('admin.products')->with('success', 'Product added successfully!');
    }

    /**
     * Update an existing product.
     */
    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'series' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'leather' => 'nullable|string|max:255',
            'turnaround' => 'nullable|string|max:100',
            'image_files' => 'nullable|array|max:10',
            'image_files.*' => 'image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $data = $request->only(['name', 'series', 'category_id', 'leather', 'turnaround']);

        if (!$request->category_id) {
            $data['category_id'] = null;
        }

        $product->update($data);

        // Handle multiple image uploads
        if ($request->hasFile('image_files')) {
            $maxSort = $product->images()->max('sort_order') ?? -1;
            $sortOrder = $maxSort + 1;

            foreach ($request->file('image_files') as $file) {
                if ($file->isValid()) {
                    $filename = 'product_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $storedPath = $file->storeAs('products', $filename, 'public');
                    $imagePath = 'storage/' . $storedPath;

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                        'sort_order' => $sortOrder++,
                    ]);
                }
            }

            // Update main image to the first image
            $firstImage = $product->images()->orderBy('sort_order')->first();
            if ($firstImage) {
                $product->update(['image' => $firstImage->image_path]);
            }
        }

        return redirect()->route('admin.products')->with('success', '"' . $product->name . '" updated successfully!');
    }

    /**
     * Delete a product.
     */
    public function deleteProduct(Product $product)
    {
        $name = $product->name;
        $product->delete();
        return redirect()->route('admin.products')->with('success', '"' . $name . '" deleted successfully!');
    }

    /**
     * Delete a single product image.
     */
    public function deleteProductImage(ProductImage $productImage)
    {
        $productId = $productImage->product_id;
        $productImage->delete();

        // Update product's main image
        $product = Product::find($productId);
        if ($product) {
            $firstImage = $product->images()->orderBy('sort_order')->first();
            $product->update(['image' => $firstImage ? $firstImage->image_path : null]);
        }

        return back()->with('success', 'Image deleted.');
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
     * Display the categories management view.
     */
    public function categories()
    {
        $categories = Category::withCount('products')->orderBy('name')->get();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Store a new category.
     */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
        ]);

        Category::create($request->only('name'));

        return redirect()->route('admin.categories')->with('success', 'Category added successfully!');
    }

    /**
     * Update a category.
     */
    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->only('name'));

        return redirect()->route('admin.categories')->with('success', '"' . $category->name . '" updated successfully!');
    }

    /**
     * Delete a category.
     */
    public function deleteCategory(Category $category)
    {
        $name = $category->name;
        $category->delete();
        return redirect()->route('admin.categories')->with('success', '"' . $name . '" deleted successfully!');
    }

    /**
     * Display Shoe Toe guide management.
     */
    public function shoeToes()
    {
        $shoeToes = ShoeToe::orderBy('sort_order')->orderBy('id')->get();
        $canAdd = $shoeToes->count() < 6;
        return view('admin.guides.shoe-toes', compact('shoeToes', 'canAdd'));
    }

    /**
     * Show form to create a new Shoe Toe.
     */
    public function createShoeToe()
    {
        if (ShoeToe::count() >= 6) {
            return redirect()->route('admin.guides.shoe-toes')->with('error', 'Maksimal 6 item shoe toe.');
        }
        $shoeToe = null;
        return view('admin.guides.shoe-toe-form', compact('shoeToe'));
    }

    /**
     * Store a new Shoe Toe.
     */
    public function storeShoeToe(Request $request)
    {
        if (ShoeToe::count() >= 6) {
            return redirect()->route('admin.guides.shoe-toes')->with('error', 'Maksimal 6 item shoe toe.');
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ], [
            'name.required' => 'Nama shoe toe wajib diisi.',
            'image.image' => 'File yang dipilih harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan: JPG, JPEG, PNG, WEBP, atau SVG.',
            'image.max' => 'Ukuran file gambar maksimal 5MB.',
        ]);

        $data = $request->only(['name', 'description']);
        $data['sort_order'] = ShoeToe::max('sort_order') + 1;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if (!$file->isValid()) {
                return back()->withInput()->withErrors([
                    'image' => 'File gambar gagal diunggah: ' . ($file->getErrorMessage() ?: 'File tidak valid atau terputus saat upload.')
                ]);
            }

            try {
                $filename = 'toe_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $storedPath = $file->storeAs('guides', $filename, 'public');
                if (!$storedPath) {
                    return back()->withInput()->withErrors([
                        'image' => 'Gagal menyimpan file gambar ke server. Pastikan folder storage dapat ditulisi.'
                    ]);
                }
                $data['image'] = 'storage/' . $storedPath;
            } catch (\Throwable $e) {
                return back()->withInput()->withErrors([
                    'image' => 'Terjadi kesalahan saat memproses gambar: ' . $e->getMessage()
                ]);
            }
        }

        ShoeToe::create($data);

        return redirect()->route('admin.guides.shoe-toes')->with('success', 'Shoe toe berhasil ditambahkan.');
    }

    /**
     * Show form to edit a Shoe Toe.
     */
    public function editShoeToe(ShoeToe $shoeToe)
    {
        return view('admin.guides.shoe-toe-form', compact('shoeToe'));
    }

    /**
     * Update a Shoe Toe.
     */
    public function updateShoeToe(Request $request, ShoeToe $shoeToe)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ], [
            'name.required' => 'Nama shoe toe wajib diisi.',
            'image.image' => 'File yang dipilih harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan: JPG, JPEG, PNG, WEBP, atau SVG.',
            'image.max' => 'Ukuran file gambar maksimal 5MB.',
        ]);

        $data = $request->only(['name', 'description']);
        $oldImageToDelete = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if (!$file->isValid()) {
                return back()->withInput()->withErrors([
                    'image' => 'File gambar gagal diunggah: ' . ($file->getErrorMessage() ?: 'File tidak valid atau terputus saat upload.')
                ]);
            }

            try {
                $filename = 'toe_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $storedPath = $file->storeAs('guides', $filename, 'public');
                if (!$storedPath) {
                    return back()->withInput()->withErrors([
                        'image' => 'Gagal menyimpan file gambar ke server. Gambar lama tetap dipertahankan.'
                    ]);
                }
                $newImagePath = 'storage/' . $storedPath;
                if (!empty($shoeToe->image) && $shoeToe->image !== $newImagePath) {
                    $oldImageToDelete = $shoeToe->image;
                }
                $data['image'] = $newImagePath;
            } catch (\Throwable $e) {
                return back()->withInput()->withErrors([
                    'image' => 'Terjadi kesalahan saat memproses gambar: ' . $e->getMessage()
                ]);
            }
        }

        $shoeToe->update($data);

        // Delete old image only after successful update
        if ($oldImageToDelete) {
            MediaService::delete($oldImageToDelete);
        }

        return redirect()->route('admin.guides.shoe-toes')->with('success', 'Shoe toe berhasil diperbarui.');
    }

    /**
     * Delete a Shoe Toe.
     */
    public function destroyShoeToe(ShoeToe $shoeToe)
    {
        $name = $shoeToe->name;
        $shoeToe->delete();
        return redirect()->route('admin.guides.shoe-toes')->with('success', '"' . $name . '" berhasil dihapus.');
    }

    /**
     * Display Leather guide management.
     */
    public function leathers()
    {
        $leathers = Leather::orderBy('sort_order')->orderBy('id')->get();
        $canAdd = $leathers->count() < 6;
        return view('admin.guides.leathers', compact('leathers', 'canAdd'));
    }

    /**
     * Show form to create a new Leather.
     */
    public function createLeather()
    {
        if (Leather::count() >= 6) {
            return redirect()->route('admin.guides.leathers')->with('error', 'Maksimal 6 item leather.');
        }
        $leather = null;
        return view('admin.guides.leather-form', compact('leather'));
    }

    /**
     * Store a new Leather.
     */
    public function storeLeather(Request $request)
    {
        if (Leather::count() >= 6) {
            return redirect()->route('admin.guides.leathers')->with('error', 'Maksimal 6 item leather.');
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'traits' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ], [
            'name.required' => 'Nama leather wajib diisi.',
            'image.image' => 'File yang dipilih harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan: JPG, JPEG, PNG, WEBP, atau SVG.',
            'image.max' => 'Ukuran file gambar maksimal 5MB.',
        ]);

        $data = $request->only(['name', 'traits']);
        $data['sort_order'] = Leather::max('sort_order') + 1;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if (!$file->isValid()) {
                return back()->withInput()->withErrors([
                    'image' => 'File gambar gagal diunggah: ' . ($file->getErrorMessage() ?: 'File tidak valid atau terputus saat upload.')
                ]);
            }

            try {
                $filename = 'leather_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $storedPath = $file->storeAs('guides', $filename, 'public');
                if (!$storedPath) {
                    return back()->withInput()->withErrors([
                        'image' => 'Gagal menyimpan file gambar ke server. Pastikan folder storage dapat ditulisi.'
                    ]);
                }
                $data['image'] = 'storage/' . $storedPath;
            } catch (\Throwable $e) {
                return back()->withInput()->withErrors([
                    'image' => 'Terjadi kesalahan saat memproses gambar: ' . $e->getMessage()
                ]);
            }
        }

        Leather::create($data);

        return redirect()->route('admin.guides.leathers')->with('success', 'Leather berhasil ditambahkan.');
    }

    /**
     * Show form to edit a Leather.
     */
    public function editLeather(Leather $leather)
    {
        return view('admin.guides.leather-form', compact('leather'));
    }

    /**
     * Update a Leather.
     */
    public function updateLeather(Request $request, Leather $leather)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'traits' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ], [
            'name.required' => 'Nama leather wajib diisi.',
            'image.image' => 'File yang dipilih harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan: JPG, JPEG, PNG, WEBP, atau SVG.',
            'image.max' => 'Ukuran file gambar maksimal 5MB.',
        ]);

        $data = $request->only(['name', 'traits']);
        $oldImageToDelete = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if (!$file->isValid()) {
                return back()->withInput()->withErrors([
                    'image' => 'File gambar gagal diunggah: ' . ($file->getErrorMessage() ?: 'File tidak valid atau terputus saat upload.')
                ]);
            }

            try {
                $filename = 'leather_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $storedPath = $file->storeAs('guides', $filename, 'public');
                if (!$storedPath) {
                    return back()->withInput()->withErrors([
                        'image' => 'Gagal menyimpan file gambar ke server. Gambar lama tetap dipertahankan.'
                    ]);
                }
                $newImagePath = 'storage/' . $storedPath;
                if (!empty($leather->image) && $leather->image !== $newImagePath) {
                    $oldImageToDelete = $leather->image;
                }
                $data['image'] = $newImagePath;
            } catch (\Throwable $e) {
                return back()->withInput()->withErrors([
                    'image' => 'Terjadi kesalahan saat memproses gambar: ' . $e->getMessage()
                ]);
            }
        }

        $leather->update($data);

        if ($oldImageToDelete) {
            MediaService::delete($oldImageToDelete);
        }

        return redirect()->route('admin.guides.leathers')->with('success', 'Leather berhasil diperbarui.');
    }

    /**
     * Delete a Leather.
     */
    public function destroyLeather(Leather $leather)
    {
        $name = $leather->name;
        $leather->delete();
        return redirect()->route('admin.guides.leathers')->with('success', '"' . $name . '" berhasil dihapus.');
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
