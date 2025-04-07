import 'bootstrap/dist/css/bootstrap.css';
import { createApp } from 'vue';
import vuetify from './plugins/vuetify';
import ExampleComponent from './components/ExampleComponent.vue';

const app = createApp({});
app.use(vuetify);
app.component('example-component', ExampleComponent);
app.mount('#app');