// import './bootstrap';

// resources/js/app.js
import axios from 'axios';
import { createApp } from 'vue';
import App from './components/App.vue';
import router from './router/index.js';

// import Trivia from './components/Trivia.vue';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.withCredentials = true
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const token = localStorage.getItem('token')
if (token) {
  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
}

const app = createApp(App)
app.use(router)
app.mount('#app')