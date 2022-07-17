import Vue from 'vue'
import Vuex from 'vuex'
import {DeviceUUID} from "device-uuid";

Vue.use(Vuex)
/* eslint-disable */
export default new Vuex.Store({
  state: {
    uuid: new DeviceUUID().get(),
    recent: [],
    object: {},
    compl: [],
    role: localStorage.getItem('myRole') || 'unknown'
  },
  getters: {
    getUid: state => state.uuid,
    getObject: state => state.object,
    getRecent: state => state.recent,
    getCompl: state => state.compl,
    getRole: state => state.role,
  },
  mutations: {
    SET_OBJECT: (state, resp) => {
      Vue.set(state, 'object', resp)
    },
    SET_RECENT_ARRAY: (state, resp) => {
      Vue.set(state, 'recent', resp)
    },
    SET_COMPL: (state, resp) => {
      Vue.set(state, 'compl', resp)
    },
    SET_ROLE: (state, resp) => {
      Vue.set(state, 'role', resp)
      localStorage.setItem('myRole', resp)
      console.log(resp)
    },
    SET_RECENT: (state, resp) => {
      var recent = state.recent
      if(recent.indexOf(resp) !== -1) delete recent[recent.indexOf(resp)]
      else recent.push(resp)
      recent = recent.filter(function(n){return n !== undefined});
      Vue.set(state, 'recent', recent)
      localStorage.setItem('recent_list', JSON.stringify(recent))
    },
  },
  actions: {
    SET_OBJECT: ({ commit, dispatch, getters }, object) => {
      commit('SET_OBJECT', object)
    },
    SET_RECENT: ({ commit, dispatch, getters }, id) => {
      commit('SET_RECENT', id)
    },
    SET_COMPL: ({ commit, dispatch, getters }, object) => {
      commit('SET_COMPL', object)
    },
    SET_ROLE: ({ commit, dispatch, getters }, string) => {
      commit('SET_ROLE', string)
    },
    LOAD_RECENT: ({ commit, dispatch, getters }, id) => {
      var json = localStorage.getItem('recent_list')
      if(json) {
        json = JSON.parse(json)
        if (Object.keys(json).length > 0) commit('SET_RECENT_ARRAY', json)
      }
    }
  },
  modules: {
  }
})
