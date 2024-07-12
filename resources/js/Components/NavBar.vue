<template>
  <nav class="bg-gray-800 text-white">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
      <Link href="/" class="text-2xl font-bold">Shop</Link>
      <div class="flex items-center">
        <Link href="/cart" class="mr-4 hover:text-gray-300">Cart ({{ cartItems.length }})</Link>
        <template v-if="user">
          <span class="mr-4">{{ user.name }}</span>
          <Link href="/logout" method="post" as="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</Link>
        </template>
        <template v-else>
          <Link href="/login" class="mr-4 hover:text-gray-300">Login</Link>
          <Link href="/register" class="hover:text-gray-300">Register</Link>
        </template>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { useCart } from '@/Stores/cart';

const { cartItems } = useCart();
const { props } = usePage();
const user = props.auth.user;


</script>