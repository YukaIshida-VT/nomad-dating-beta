import axiosClient from "../../axios";

const state = {
  user: null,
  hasProfile: null,
};

const getters = {
  authUser: state => {
      return state.user;
  },
  hasProfile: state => {
    return state.hasProfile;
}
};

const actions = {
  fetchAuthUser({commit, state}) {
        axiosClient.get('/auth-user')
          .then(res => {
              commit('setAuthUser', res.data.user);
              commit('setHasProfile', res.data.has_profile);
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
  setHasProfile(state, hasProfile) {
    state.hasProfile = hasProfile;
}
};

export default {
  state, getters, actions, mutations,
}
