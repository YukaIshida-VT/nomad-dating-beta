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
import axios from 'axios';
import { h } from 'vue';

// 新しいストアインスタンスを作成します
const store = createStore({
  modules: {
      User,
  }
})

// const app = createApp(App);
// 以下appにデフォルト値を設定する方法
const app = createApp({
  data() {
    return {
      user: []
    }
  },
  async created() {
    const response = await axios.get('/auth-user');
    this.user = response.data;
    console.log(this.user);
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