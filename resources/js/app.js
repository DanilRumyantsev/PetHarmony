import 'bootstrap/dist/css/bootstrap.css'; // Импортируем Bootstrap CSS
import 'bootstrap/dist/js/bootstrap.js';   // Импортируем Bootstrap JS, если нужно
import 'vuetify/styles'; // Глобальные стили Vuetify
import { createApp } from 'vue';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import customVuetify from './plugins/vuetify'; // Импортируем настроенный Vuetify
import router from './router/router.js';
import FirstWindow from './components/FirstWindow.vue';
import Profile from './components/Profile.vue';

const vuetifyInstance = createVuetify({
    components,
    directives,
});

const app = createApp({});
app.component('first-window', FirstWindow);
// app.component('profile', Profile);
app
    .use(router)
    .use(customVuetify)
    .mount('#app');
