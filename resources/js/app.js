// import './bootstrap';

// resources/js/app.js
import { createApp } from 'vue';
import App from './components/App.vue';
import router from './router/index.js';

// import Trivia from './components/Trivia.vue';

const app = createApp(App)
app.use(router)
app.mount('#app')