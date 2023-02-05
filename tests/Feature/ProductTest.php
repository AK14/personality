<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker;
class ProductTest extends TestCase
{
    use RefreshDatabase;
    private User $user;
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = $this->createUser();
        $this->admin = $this->createUser(isAdmin: true);
    }

    public function test_create_product_successful(){
        $product = array(
            'title' => 'new product',
            'price' => '202'
        );
        $response = $this->actingAs($this->admin)->post('/products', $product);

        $response->assertStatus(302);
        $response->assertRedirect('products');
        $this->assertDatabaseHas('products',$product);

        $lastProduct = Product::latest()->first();
        $this->assertEquals($product['title'],$lastProduct->title);
        $this->assertEquals($product['price'],$lastProduct->price);
    }

    public function test_products_page_empty()
    {
        $response = $this->actingAs($this->user)->get('/products');
        $response->assertSee('no products found');

        $response->assertStatus(200);
    }

    public function test_products_page_has_elements()
    {
        $product = Product::create([
        'title' => 'Test product',
        'price' => 10
        ]);

        $response = $this->actingAs($this->user)->get('/products');
        $response->assertDontSee('no products found');
        $response->assertViewHas('products', function ($collection) use ($product){
        return $collection->contains($product);
        });

        $response->assertStatus(200);
    }

    public function test_paginated_products()
    {
        $products = Product::factory(11)->create();
        $lastProduct = $products->last();

        $response = $this->actingAs($this->user)->get('/products');

        $response->assertViewHas('products', function ($collection) use ($lastProduct){
            return !$collection->contains($lastProduct);
        });

        $response->assertStatus(200);
    }

    public function test_admin_can_see_products_create_button(){
        $response = $this->actingAs($this->admin)->get('/products');

        $response->assertStatus(200);
        $response->assertSee('Add new product');
    }

    public function test_non_admin_cannot_see_products_create_button(){
        $response = $this->actingAs($this->user)->get('/products');

        $response->assertStatus(200);
        $response->assertDontSee('Add new product');
    }

    public function test_admin_can_access_products_create_page(){
        $response = $this->actingAs($this->admin)->get('/products/create');

        $response->assertStatus(200);
    }

    public function test_non_admin_cannot_access_products_create_page(){
        $response = $this->actingAs($this->user)->get('/products/create');

        $response->assertStatus(403);
    }

    public function test_product_edit_contains_correct_values()
    {
        $product = Product::factory()->create();

        $response = $this->actingAs($this->admin)->get('products/' .$product->id .'/edit');
        
        $response->assertStatus(200);
        $response->assertSee('value="' .$product->title .'"', false);
        $response->assertViewHas('product', $product);
    }

    public function test_product_update_validation_redirects_back_to_form(){
        $product = Product::factory()->create();
        $response = $this->actingAs($this->admin)->put('products/' .$product->id, Array(
            'title' =>'',
            'price' => ''
        ));
        $response->assertStatus(302);
//        $response->assertSessionHasErrors(Array('title'));
        $response->assertInvalid(['title','price']);
    }

    public function test_product_delete_successful(){
        $product = Product::factory()->create();
        $response = $this->actingAs($this->admin)->delete('products/' .$product->id);
        $response->assertStatus(302);
        $response->assertRedirect('products');
        $this->assertDatabaseMissing('products', $product->toArray());
        $this->assertDatabaseCount('products',0 );
    }

    /**
     * @param bool $isAdmin
     * @return User
     */
    private function createUser(bool $isAdmin = false):User
    {
        return User::factory()->create(
            Array( 'is_admin' => $isAdmin )
        );
    }
}
