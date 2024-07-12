<template>
	<DefaultLayout>
		<h1 class="text-3xl font-bold mb-8">Login</h1>
		<form @submit.prevent="submit" class="max-w-md mx-auto">
			<div class="mb-4">
				<label for="email" class="block mb-2">Email</label>
				<input type="email" id="email" v-model="form.email" required class="w-full px-3 py-2 border rounded">
			</div>
			<div class="mb-4">
				<label for="password" class="block mb-2">Password</label>
				<input type="password" id="password" v-model="form.password" required
					class="w-full px-3 py-2 border rounded">
			</div>
			<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
				Login
			</button>
			<span class="text-red-500" v-if="errors.auth">{{ errors.auth }}</span>
		</form>
	</DefaultLayout>
</template>
  
<script setup>
import { reactive, ref } from 'vue';
import { router } from '@inertiajs/vue3'
import DefaultLayout from '../Layouts/DefaultLayout.vue';


const form = reactive({
	email: '',
	password: '',
});

const errors = ref({});

const submit = () => {
  router.post('/login', form, {
    onError: (err) => {
      errors.value = err;
    }
  });
};
</script>