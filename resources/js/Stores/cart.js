import { ref, computed } from 'vue';
import axios from 'axios';
import { usePage } from '@inertiajs/vue3';

export function useCart() {
  const page = usePage();
  const cartItems = ref(page.props.cartItems || []);

  console.log(page.props)

  console.log(cartItems.value) // works fine

  const addToCart = async (product) => {
    try {
      const response = await axios.post('/api/cart/add', { productId: product.id });
      if (response.data.success) {
        const newItem = response.data.cartItem;
        cartItems.value.push(newItem);
      }
    } catch (error) {
      console.error("There was an error adding the product to the cart:", error);
    }
  };

  const removeFromCart = async (itemId) => {
    try {
      const item = cartItems.value.find(item => item.id === itemId);
      const response = await axios.post('/api/cart/remove', { productId: item.product.id });
      if (response.data.success) {
        const index = cartItems.value.findIndex(item => item.id === itemId);
        if (index !== -1) {
          cartItems.value.splice(index, 1);
        }
      }
    } catch (error) {
      console.error("There was an error removing the product from the cart:", error);
    }
  };

  const cartTotal = computed(() => {
    return cartItems.value.reduce((total, item) => total + (item.product.price * item.quantity), 0);
  });

  return {
    cartItems,
    addToCart,
    removeFromCart,
    cartTotal,
  };
}