import './bootstrap';
import { createApp } from 'vue';
import { createStore } from 'vuex'
import{ createVuetify } from 'vuetify'
import App from "../views/App.vue"
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css'
import '../css/app.css';
import router from "./router"
import User from './store/modules/user';

// 新しいストアインスタンスを作成します
const store = createStore({
  modules: {
      User,
  }
})

const app = createApp(App);
const vuetify = createVuetify();

app.use(router)
app.use(store)
app.use(vuetify) 
app.mount('#app');