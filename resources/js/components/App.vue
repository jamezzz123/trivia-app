<template>
    <router-view></router-view>
</template>

<script>
import axios from 'axios';
export default {
    name: 'App',
    mounted() {
        const token = localStorage.getItem('token');
        if (token) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        }

        axios.interceptors.response.use(response => {
            return response;
        }, error => {
            if (error.response.status === 401) {
                localStorage.removeItem('token');
                this.$router.push('/login');
            }
            return Promise.reject(error);
        });
    }
}
</script>