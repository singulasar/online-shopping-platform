<template>
	<DefaultLayout>
		<div class="flex flex-col md:flex-row">
			<img :src="product.image_url" :alt="product.title"
				class="w-full md:w-1/2 h-64 md:h-auto object-cover mb-4 md:mb-0 md:mr-8">
			<div>
				<h1 class="text-3xl font-bold mb-4">{{ product.title }}</h1>
				<p class="text-xl text-gray-600 mb-4">{{ product.price.toFixed(2) }} USD</p>
				<p class="text-gray-700 mb-6">{{ product.description }}</p>
				<button @click="handleAddToCart" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
					Add to Cart
				</button>
			</div>
		</div>
	</DefaultLayout>
</template>
  
<script setup>
import { useCart } from '@/Stores/cart';
import DefaultLayout from '../Layouts/DefaultLayout.vue';


const props = defineProps(['product']);
const { addToCart } = useCart();

const handleAddToCart = () => {
	addToCart(props.product);
};
</script>