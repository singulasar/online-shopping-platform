<template>
  <div @click="redirectToProduct" class="border rounded-lg p-4 shadow-md">
      <img :src="product.image_url" :alt="product.title" class="w-full h-48 object-cover mb-4">
      <h2 class="text-xl font-bold mb-2">{{ product.title }}</h2>
      <p class="text-gray-600 mb-2">{{ formatPrice(product.price) }} USD</p>
    <button @click.stop="handleAddToCart" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
      Add to Cart
    </button>
  </div>
</template>
  
<script setup>
import { useCart } from '@/Stores/cart';
import { router } from '@inertiajs/vue3'

const props = defineProps(['product']);
const { addToCart } = useCart();

const redirectToProduct = () => {
  router.get(`/products/${props.product.id}`);
};

const handleAddToCart = () => {
  addToCart(props.product);
};

const formatPrice = (price) => {
  const numPrice = Number(price);
  return isNaN(numPrice) ? '0.00' : numPrice.toFixed(2);
};
</script>