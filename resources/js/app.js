// import 'bootstrap/dist/css/bootstrap.css'; // Импортируем Bootstrap CSS
// import 'bootstrap/dist/js/bootstrap.js';   // Импортируем Bootstrap JS, если нужно
import 'bootstrap';
import 'vuetify/styles'; // Глобальные стили Vuetify
import { createApp } from 'vue';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import customVuetify from './plugins/vuetify'; // Импортируем настроенный Vuetify
import router from './router/router.js';
import store from './store.js';
import FirstWindow from "./components/FirstWindow.vue";
import axios from 'axios';
const vuetifyInstance = createVuetify({
    components,
    directives,
});

axios.defaults.withCredentials = true;
axios.defaults.xsrfCookieName = 'XSRF-TOKEN';
axios.defaults.xsrfHeaderName = 'X-XSRF-TOKEN';

const app = createApp({});
app.component('FirstWindow', FirstWindow);
// app.component('profile', Profile);
app
    .use(router)
    .use(customVuetify)
    .use(store)
    .mount('#app');
