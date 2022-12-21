import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    accessToken: '',
    authUser : {}
  },
  mutations : {
    setAuthUser(state, payload) {
      state.authUser = payload;
    },
    setAccessToken(state, payload) {
      state.accessToken = payload;
    },
  },
  getters: {
    getAuthUser(state, getters) {
      return state.authUser
    },
    getAccessToken(state, getters) {
      return state.accessToken;
    },
  },
  plugins: [createPersistedState({paths: ['authUser', 'accessToken']})]
})
