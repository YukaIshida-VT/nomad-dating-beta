const state = {
  user: null,
  token: null,
};

const getters = {
  authUser: state => {
      return state.user;
  },
  token: state => {
    return state.token;
}
};

const actions = {
  fetchAuthUser({commit, state}) {
      axios.post('/auth-user')
          .then(res => {
              commit('setAuthUser', res.data.user);
              // stateにtokenをセットしてもaxiosで取り出しがうまくいかないため、sessionStorageに保存する
              sessionStorage.setItem('TOKEN', res.data.token);
          })
          .catch(error => {
              console.log('Unable to fetch auth user');
          });
  }
};

const mutations = {
  setAuthUser(state, user) {
      state.user = user;
  },
  setToken(state, token) {
    state.token = token;
}
};

export default {
  state, getters, actions, mutations,
}
