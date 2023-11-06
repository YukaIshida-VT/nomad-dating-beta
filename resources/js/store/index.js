import { createStore } from 'vuex'
import User from './modules/user';

// 新しいストアインスタンスを作成します
const store = createStore({
  modules: {
      User,
  }
})

export default store;