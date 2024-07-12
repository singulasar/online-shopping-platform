<template>
	<div class="container mx-auto px-4 py-8">
	  <NavBar />
	  <slot></slot>
	</div>
  </template>
  
  <script>
  import NavBar from '../Components/NavBar.vue';
  
  export default {
	components: {
	  NavBar
	}
  }
  </script>
  