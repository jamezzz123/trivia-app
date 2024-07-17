<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign up</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input name="text" type="text" 
                            v-model="name"
                            class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label  class="block text-sm font-medium leading-6 text-gray-900">Phone
                            Number</label>
                    </div>
                    <div class="mt-2">
                        <input v-model="phoneNumber"  name="phone_number" type="text"
                            class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="flex space-y-2 flex-col items-center justify-between">
                    <button  @click.prevent="handleSignup"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                    <button @click.prevent="router.push('/login')" type="submit"

                        class="flex w-full justify-center rounded-md  px-3 py-1.5 text-sm font-semibold leading-6 text-indigo-600  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
                </div>
            </form>
        </div>
    </div>

</template>


<script>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
    setup() {
        const name = ref('');
        const phoneNumber = ref('');
        const router = useRouter();

        const handleSignup = async () => {
            try {
                const response = await axios.post('/api/signup', {
                    name: name.value,
                    phone_number: phoneNumber.value
                });
                localStorage.setItem('token', response.data.token);
                axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;
                router.push({ name: 'Trivia' });
            } catch (error) {
                console.error('Signup failed:', error);
                // Handle signup error (show message to user)
            }
        };

        return {
            name,
            phoneNumber,
            handleSignup,
            router
        };
    }
}
</script>
