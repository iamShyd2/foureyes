<?php

namespace Tests\Feature;

use Tests\AdminTestCase as TestCase;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class AdminProductTest extends TestCase
{

    public function test_fetches_all_products()
    {
        $response = $this->get('/api/admin/products');
        $response->assertOk();
    }

    public function test_store_product()
    {
        Storage::fake('products');
        $product = Product::factory()->make(["image" =>  UploadedFile::fake()->image('product.jpg')])->toArray();
        $response = $this->post('/api/admin/products', $product);
        $response->assertCreated();
        //Storage::disk('products')->assertExists($product["image"]->name);
        $this->assertDatabaseHas('products', $product);
    }

}
