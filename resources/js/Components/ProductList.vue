<template>
	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
	  <ProductCard v-for="product in products" :key="product.id" :product="product" />
	</div>
  </template>
  
  <script setup>
  import ProductCard from '@/Components/ProductCard.vue';
  
  defineProps(['products']);
  </script>
  