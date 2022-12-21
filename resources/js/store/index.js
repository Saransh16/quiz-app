import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    accessToken: '',
    authUser : {},
    questions : []
  },
  mutations : {
    setAuthUser(state, payload) {
      state.authUser = payload;
    },
    setAccessToken(state, payload) {
      state.accessToken = payload;
    },
    setQuestions(state, payload) {
      state.questions = payload;
    }
  },
  getters: {
    getAuthUser(state, getters) {
      return state.authUser
    },
    getAccessToken(state, getters) {
      return state.accessToken;
    },
    getQuestions(state, getters) {
      return state.questions;
    }
  },
  plugins: [createPersistedState({paths: ['authUser', 'accessToken', 'questions']})]
})
