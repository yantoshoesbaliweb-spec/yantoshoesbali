<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\ShoeToe;
use App\Models\Leather;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShoeToeUploadTest extends TestCase
{
    use DatabaseTransactions;
    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function test_shoe_toe_falls_back_to_default_image_when_missing_or_failed(): void
    {
        $toe = ShoeToe::create([
            'name' => 'Fallback Toe Test',
            'image' => 'storage/guides/non_existent_image_12345.jpg',
            'description' => 'Test fallback',
        ]);

        $this->assertStringContainsString('toe_square_custom.jpg', $toe->image_url);

        $emptyToe = ShoeToe::create([
            'name' => 'Empty Image Toe',
            'image' => null,
            'description' => 'Test empty image',
        ]);

        $this->assertStringContainsString('toe_square_custom.jpg', $emptyToe->image_url);
    }

    public function test_shoe_toe_upload_rejects_files_exceeding_max_size(): void
    {
        $admin = User::first() ?? User::factory()->create();

        // Count current shoe toes so we don't exceed max 6
        while (ShoeToe::count() >= 6) {
            ShoeToe::latest('id')->first()->delete();
        }

        // 6MB fake file (exceeds 5120KB limit)
        $oversizedFile = UploadedFile::fake()->create('huge_boot.jpg', 6144, 'image/jpeg');

        $response = $this->actingAs($admin)->post(route('admin.guides.shoe-toes.store'), [
            'name' => 'Oversized Toe Test',
            'image' => $oversizedFile,
        ]);

        $response->assertSessionHasErrors(['image']);
    }

    public function test_shoe_toe_upload_rejects_non_image_files(): void
    {
        $admin = User::first() ?? User::factory()->create();

        while (ShoeToe::count() >= 6) {
            ShoeToe::latest('id')->first()->delete();
        }

        $pdfFile = UploadedFile::fake()->create('document.pdf', 500, 'application/pdf');

        $response = $this->actingAs($admin)->post(route('admin.guides.shoe-toes.store'), [
            'name' => 'PDF Toe Test',
            'image' => $pdfFile,
        ]);

        $response->assertSessionHasErrors(['image']);
    }

    public function test_shoe_toe_update_preserves_old_image_if_new_upload_fails(): void
    {
        $admin = User::first() ?? User::factory()->create();

        $originalFile = 'guides/original_toe_' . uniqid() . '.jpg';
        Storage::disk('public')->put($originalFile, 'original image data');

        $toe = ShoeToe::create([
            'name' => 'Original Toe',
            'image' => 'storage/' . $originalFile,
        ]);

        // Attempt update with invalid file (PDF)
        $invalidFile = UploadedFile::fake()->create('bad_file.pdf', 200, 'application/pdf');

        $response = $this->actingAs($admin)->put(route('admin.guides.shoe-toes.update', $toe), [
            'name' => 'Updated Toe Name',
            'image' => $invalidFile,
        ]);

        $response->assertSessionHasErrors(['image']);

        // Check that original image still exists on disk and in database
        $this->assertTrue(Storage::disk('public')->exists($originalFile));
        $this->assertEquals('storage/' . $originalFile, $toe->fresh()->image);

        // Clean up
        $toe->delete();
    }

    public function test_storage_fallback_route_serves_uploaded_file(): void
    {
        $testFile = 'guides/fallback_route_test_' . uniqid() . '.jpg';
        Storage::disk('public')->put($testFile, 'fake binary image content');

        $response = $this->get('/storage/' . $testFile);
        $response->assertStatus(200);
        $response->assertHeader('Content-Type');
    }
}
