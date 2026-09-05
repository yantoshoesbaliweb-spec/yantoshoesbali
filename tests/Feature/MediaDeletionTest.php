<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ShoeToe;
use App\Models\Leather;
use App\Models\Content;
use App\Models\User;
use App\Services\MediaService;

class MediaDeletionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Ensure public storage directory exists for testing
        Storage::disk('public')->makeDirectory('test_media');
    }

    public function test_media_service_deletes_disk_file_and_protects_static_assets(): void
    {
        // 1. Create a dummy file in storage
        $testFile = 'test_media/sample_' . uniqid() . '.jpg';
        Storage::disk('public')->put($testFile, 'dummy content');
        $this->assertTrue(Storage::disk('public')->exists($testFile));

        // Delete using 'storage/' prefix
        $deleted = MediaService::delete('storage/' . $testFile);
        $this->assertTrue($deleted);
        $this->assertFalse(Storage::disk('public')->exists($testFile));

        // 2. Test protected assets are untouched
        $protectedResult = MediaService::delete('images/product_tan.png');
        $this->assertFalse($protectedResult);
        $this->assertTrue(file_exists(public_path('images/product_tan.png')));
    }

    public function test_product_deletion_removes_all_associated_product_images_from_disk(): void
    {
        $file1 = 'products/test_prod_img_' . uniqid() . '.jpg';
        $file2 = 'products/test_prod_img_' . uniqid() . '.jpg';
        Storage::disk('public')->put($file1, 'data1');
        Storage::disk('public')->put($file2, 'data2');

        $product = Product::create([
            'name' => 'Auto Test Product ' . uniqid(),
            'image' => 'storage/' . $file1,
            'status' => 'Active',
        ]);

        ProductImage::create([
            'product_id' => $product->id,
            'image_path' => 'storage/' . $file1,
            'sort_order' => 0,
        ]);

        ProductImage::create([
            'product_id' => $product->id,
            'image_path' => 'storage/' . $file2,
            'sort_order' => 1,
        ]);

        $this->assertTrue(Storage::disk('public')->exists($file1));
        $this->assertTrue(Storage::disk('public')->exists($file2));

        // Delete the product
        $product->delete();

        // Check both physical files are removed
        $this->assertFalse(Storage::disk('public')->exists($file1), 'File 1 should be deleted from disk');
        $this->assertFalse(Storage::disk('public')->exists($file2), 'File 2 should be deleted from disk');
        $this->assertNull(Product::find($product->id));
        $this->assertEquals(0, ProductImage::where('product_id', $product->id)->count());
    }

    public function test_single_product_image_deletion_removes_file_from_disk(): void
    {
        $file = 'products/test_single_' . uniqid() . '.jpg';
        Storage::disk('public')->put($file, 'single');

        $product = Product::create([
            'name' => 'Single Image Test ' . uniqid(),
            'status' => 'Active',
        ]);

        $productImage = ProductImage::create([
            'product_id' => $product->id,
            'image_path' => 'storage/' . $file,
            'sort_order' => 0,
        ]);

        $this->assertTrue(Storage::disk('public')->exists($file));

        $productImage->delete();

        $this->assertFalse(Storage::disk('public')->exists($file), 'Single product image should be deleted from disk');

        $product->delete();
    }

    public function test_shoe_toe_deletion_removes_file_from_disk(): void
    {
        $file = 'guides/test_toe_' . uniqid() . '.jpg';
        Storage::disk('public')->put($file, 'toe');

        $toe = ShoeToe::create([
            'name' => 'Test Toe ' . uniqid(),
            'image' => 'storage/' . $file,
        ]);

        $this->assertTrue(Storage::disk('public')->exists($file));

        $toe->delete();

        $this->assertFalse(Storage::disk('public')->exists($file), 'ShoeToe file should be deleted from disk');
    }

    public function test_leather_deletion_removes_file_from_disk(): void
    {
        $file = 'guides/test_leather_' . uniqid() . '.jpg';
        Storage::disk('public')->put($file, 'leather');

        $leather = Leather::create([
            'name' => 'Test Leather ' . uniqid(),
            'image' => 'storage/' . $file,
        ]);

        $this->assertTrue(Storage::disk('public')->exists($file));

        $leather->delete();

        $this->assertFalse(Storage::disk('public')->exists($file), 'Leather file should be deleted from disk');
    }

    public function test_header_slide_removal_deletes_orphan_media_from_disk(): void
    {
        $admin = User::first() ?? User::factory()->create();

        $heroFile = 'hero/test_hero_' . uniqid() . '.jpg';
        Storage::disk('public')->put($heroFile, 'hero');
        $this->assertTrue(Storage::disk('public')->exists($heroFile));

        // Save header with this slide
        Content::setByKey('header', [
            'slides' => [
                [
                    'title' => 'Temporary Slide',
                    'image' => 'storage/' . $heroFile,
                ],
                [
                    'title' => 'Default Slide',
                    'image' => 'images/hero_boots.png',
                ],
            ],
        ]);

        // Submit update WITHOUT the temporary slide (simulating deletion in admin)
        $response = $this->actingAs($admin)->post(route('admin.content.header.update'), [
            'content' => [
                'slides' => [
                    [
                        'title' => 'Default Slide',
                        'image' => 'images/hero_boots.png',
                    ],
                ],
            ],
        ]);

        $response->assertRedirect();
        $this->assertFalse(Storage::disk('public')->exists($heroFile), 'Removed hero slide image should be deleted from disk');
        $this->assertTrue(file_exists(public_path('images/hero_boots.png')), 'Protected hero boots image must remain intact');
    }

    public function test_testimony_removal_deletes_orphan_media_from_disk(): void
    {
        $admin = User::first() ?? User::factory()->create();

        $reviewerFile = 'reviewers/test_rev_' . uniqid() . '.jpg';
        Storage::disk('public')->put($reviewerFile, 'reviewer avatar');
        $this->assertTrue(Storage::disk('public')->exists($reviewerFile));

        // Save testimony with this avatar
        Content::setByKey('testimonies', [
            'items' => [
                [
                    'author' => 'Test Reviewer',
                    'text' => 'Great boots!',
                    'avatar' => 'storage/' . $reviewerFile,
                ],
                [
                    'author' => 'Permanent Reviewer',
                    'text' => 'Amazing quality.',
                    'avatar' => 'images/testimonial-1.jpg',
                ],
            ],
        ]);

        // Submit update WITHOUT the test reviewer
        $response = $this->actingAs($admin)->post(route('admin.content.testimonies.update'), [
            'content' => [
                'items' => [
                    [
                        'author' => 'Permanent Reviewer',
                        'text' => 'Amazing quality.',
                        'avatar' => 'images/testimonial-1.jpg',
                    ],
                ],
            ],
        ]);

        $response->assertRedirect();
        $this->assertFalse(Storage::disk('public')->exists($reviewerFile), 'Removed testimony avatar image should be deleted from disk');
    }
}
