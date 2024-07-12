<template>
  <DefaultLayout>
    <h1 class="text-3xl font-bold mb-8">Register</h1>
    <form @submit.prevent="submit" class="max-w-md mx-auto">
      <div class="mb-4">
        <label for="name" class="block mb-2">Name</label>
        <input type="text" id="name" v-model="form.name" required class="w-full px-3 py-2 border rounded">
        <span class="text-red-500" v-if="errors.name">{{ errors.name }}</span>
      </div>
      <div class="mb-4">
        <label for="email" class="block mb-2">Email</label>
        <input type="email" id="email" v-model="form.email" required class="w-full px-3 py-2 border rounded">
        <span class="text-red-500" v-if="errors.email">{{ errors.email }}</span>
      </div>
      <div class="mb-4">
        <label for="password" class="block mb-2">Password</label>
        <input type="password" id="password" v-model="form.password" required class="w-full px-3 py-2 border rounded">
        <span class="text-red-500" v-if="errors.password">{{ errors.password }}</span>
      </div>
      <div class="mb-4">
        <label for="password_confirmation" class="block mb-2">Confirm Password</label>
        <input type="password" id="password_confirmation" v-model="form.password_confirmation" required
          class="w-full px-3 py-2 border rounded">
        <span class="text-red-500" v-if="errors.password_confirmation">{{ errors.password_confirmation }}</span>
      </div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Register
      </button>
    </form>
  </DefaultLayout>
</template>
  
<script setup>
import { reactive, ref } from 'vue';
import { router } from '@inertiajs/vue3'
import DefaultLayout from '../Layouts/DefaultLayout.vue';


const form = reactive({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const errors = ref({});

const submit = () => {
  router.post('/register', form, {
    onError: (err) => {
      errors.value = err;
    }
  });
};
</script>