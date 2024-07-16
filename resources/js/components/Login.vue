<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-md w-full space-y-8">
        <div>
          <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Sign in to Trivia Game
          </h2>
        </div>
        <form class="mt-8 space-y-6" @submit.prevent="handleLogin">
          <div class="rounded-md shadow-sm -space-y-px">
            <div>
              <label for="phone-number" class="sr-only">Phone number</label>
              <input id="phone-number" name="phone" type="tel" required
                     class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                     placeholder="Phone number"
                     v-model="phoneNumber">
            </div>
          </div>
  
          <div>
            <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Sign in
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import axios from 'axios';
  
  export default {
    emits: ['login-success'],
    setup(props, { emit }) {
      const phoneNumber = ref('');
  
      const handleLogin = async () => {
        try {
        //   const response = await axios.post('/api/login', { phone_number: phoneNumber.value });
          localStorage.setItem('token', response.data.token);
        //   axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;
          emit('login-success');
        } catch (error) {
          console.error('Login failed:', error);
          // Handle login error (show message to user)
        }
      };
  
      return {
        phoneNumber,
        handleLogin
      };
    }
  }
  </script>