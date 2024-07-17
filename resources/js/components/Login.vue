<template>
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6">

        <div>
          <div class="flex items-center justify-between">
            <label class="block text-sm font-medium leading-6 text-gray-900">Phone
              Number</label>
          </div>
          <div class="mt-2">
            <input v-model="phoneNumber" name="phone_number" type="text"
              class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="flex space-y-2 flex-col items-center justify-between">
          <button @click.prevent="handleLogin"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
          <button @click.prevent="$router.push('/')" type="submit"
            class="flex w-full justify-center rounded-md  px-3 py-1.5 text-sm font-semibold leading-6 text-indigo-600  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
            up</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css'; // for React, Vue and Svelte

// Create an instance of Notyf
const notyf = new Notyf();

export default {
  emits: ['login-success'],
  setup(props, { emit }) {
    const phoneNumber = ref('');
    const router = useRouter();

    const handleLogin = async () => {
      try {
        const response = await axios.post('/api/login', { phone_number: phoneNumber.value });
        localStorage.setItem('token', response.data.token);
        axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;
        router.push('/trivia')
      } catch (error) {
        console.error('Login failed:', error);
        notyf.error(error.response.data.message || 'Login failed');
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