import './bootstrap';
import { createApp } from 'vue';
import store from './store'
import{ createVuetify } from 'vuetify'
import App from "../views/App.vue"
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css'
import '../css/app.css';
import router from "./router"
import axios from 'axios';
import { h } from 'vue';

// const app = createApp(App);
// 以下appにデフォルト値を設定する場合
const app = createApp({
  data() {
    return {
      user: []
    }
  },
  async created() {
    store.dispatch('fetchAuthUser');
    // const response = await axios.post('/auth-user');
    // console.log(response.data);
    // this.user = response.data.user;
    // sessionStorage.setItem('TOKEN', response.data.token);
  },
  render() {
    return h(App, { users: this.user });
  }
});

const vuetify = createVuetify();

app.use(router)
app.use(store)
app.use(vuetify) 
app.mount('#app');