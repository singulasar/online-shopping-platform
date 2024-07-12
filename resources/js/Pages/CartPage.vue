<template>
	<DefaultLayout>
	  <h1 class="text-3xl font-bold mb-8">Your Cart</h1>
	  <div v-if="cartItems.length === 0" class="text-xl text-gray-600">
		Your cart is empty.
	  </div>
	  <div v-else>
		<div v-for="item in cartItems" :key="item.id" class="flex items-center justify-between border-b py-4">
		  <div class="flex items-center">
			<img :src="item.product.image_url" :alt="item.product.title" class="w-16 h-16 object-cover mr-4">
			<div>
			  <h2 class="text-xl font-semibold">{{ item.title }}</h2>
			  <p class="text-gray-600">{{ item.product.price.toFixed(2) }} USD</p>
			</div>
		  </div>
		  <button @click="removeFromCart(item.id)" class="text-red-500 hover:text-red-600">
			Remove
		  </button>
		</div>
		<div class="mt-8 text-xl font-bold">
		  Total: {{ cartTotal.toFixed(2) }} USD
		</div>
	  </div>
	</DefaultLayout>
  </template>
  
  <script setup>
  import { useCart } from '@/Stores/cart';
  import DefaultLayout from '../Layouts/DefaultLayout.vue';
  
  const { cartItems, removeFromCart, cartTotal } = useCart();
  </script>