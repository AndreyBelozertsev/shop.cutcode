<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home_page_status()
    {
       
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page_active_objects()
    {
        $brand = Brand::factory()->create(['is_home_page'=>1]);
        $category = Category::factory()->create(['is_home_page'=>1]);
        $product = Product::factory()->create();
        
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText($brand->title);
        $response->assertSeeText($category->title);
        $response->assertSeeText($product->title);
    }

    public function test_home_page_no_active_objects()
    {
        $brand = Brand::factory()->create(['status'=>0]);
        $category = Category::factory()->create(['status'=>0]);
        $product = Product::factory()->create(['status'=>0]);

        $this->assertDatabaseHas('brands',[
            'title'=>$brand->title
        ]);
        $this->assertDatabaseHas('categories',[
            'title'=>$category->title
        ]);

        $this->assertDatabaseHas('products',[
            'title'=>$product->title
        ]);
        
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertDontSeeText($brand->title);
        $response->assertDontSeeText($category->title);
        $response->assertDontSeeText($product->title);
    }

    public function test_home_page_for_main_page_objects()
    {
        $brand = Brand::factory()->create(['is_home_page'=>1]);
        $category = Category::factory()->create(['is_home_page'=>1]);


        
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText($brand->title);
        $response->assertSeeText($category->title);
    }
}
