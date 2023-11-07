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
