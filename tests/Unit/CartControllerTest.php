<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartControllerTest extends TestCase
{
	use RefreshDatabase;

	public function testAddDefaultAmountToCart()
	{
		$user = User::factory()->create();
		$product = Product::factory()->create();

		$this->actingAs($user);

		$response = $this->postJson('/api/cart/add', [
			'productId' => $product->id
		]);

		$response->assertStatus(200);
		$response->assertJson([
			'success' => true,
			'cartItem' => [
				'product_id' => $product->id,
				'quantity' => 1
			]
		]);

		$this->assertDatabaseHas('cart_items', [
			'product_id' => $product->id,
			'quantity' => 1
		]);
	}

	public function testAddCustomAmountToCart()
	{
		$user = User::factory()->create();
		$product = Product::factory()->create();

		$this->actingAs($user);

		$response = $this->postJson('/api/cart/add', [
			'productId' => $product->id,
			'quantity' => 5
		]);

		$response->assertStatus(200);
		$response->assertJson([
			'success' => true,
			'cartItem' => [
				'product_id' => $product->id,
				'quantity' => 5
			]
		]);

		$this->assertDatabaseHas('cart_items', [
			'product_id' => $product->id,
			'quantity' => 5
		]);
	}

	public function testRemoveProductFromCart()
	{
		$user = User::factory()->create();
		$product = Product::factory()->create();
		$cart = Cart::factory()->create(['user_id' => $user->id]);
		CartItem::factory()->create([
			'cart_id' => $cart->id,
			'product_id' => $product->id,
			'quantity' => 1
		]);

		$this->actingAs($user);

		$response = $this->postJson('/api/cart/remove', [
			'productId' => $product->id
		]);

		$response->assertStatus(200);
		$response->assertJson([
			'success' => true,
			'productId' => $product->id
		]);

		$this->assertDatabaseMissing('cart_items', [
			'product_id' => $product->id
		]);
	}
}
