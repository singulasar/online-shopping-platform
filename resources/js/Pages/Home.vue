<template>
  <DefaultLayout>

    <!-- If the user is logged in, show the browse products button -->
    <div v-if="user">
      <h1 class="text-3xl font-bold mb-8">Welcome to our Online Shop</h1>
      <ProductList :products="products" />
    </div>
    <div v-else>
      <p class="text-xl text-red-600 text-center">Please login to view our store products.</p>
    </div>

  </DefaultLayout>
</template>
  
<script setup>
import { usePage } from '@inertiajs/vue3';
import DefaultLayout from '../Layouts/DefaultLayout.vue';
import ProductList from '@/Components/ProductList.vue';

// Accessing the global page props to get the user's authentication status
const { props } = usePage();
const user = props.auth.user;
const products = props.products;
</script>