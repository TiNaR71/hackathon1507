import Vue from 'vue'
import Vuex from 'vuex'
import {DeviceUUID} from "device-uuid";

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    uuid: new DeviceUUID().get(),
    objects: []
  },
  getters: {
    getUid: state => state.uuid,
    getObjects: state => state.objects,
  },
  mutations: {
  },
  actions: {
  },
  modules: {
  }
})
