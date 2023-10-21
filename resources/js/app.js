import './bootstrap';
import { createApp } from 'vue';
import{ createVuetify } from 'vuetify'
import App from "../views/App.vue"
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css'
import '../css/app.css';

const app = createApp(App);
const vuetify = createVuetify();

app.use(vuetify) 
app.mount('#app');