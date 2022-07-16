import Vue from 'vue'
import router from './router'
import store from './store'
import '../public/scss/style.scss'
import { directive as onClickaway } from 'vue-clickaway'
import axios from "axios";

Vue.config.productionTip = false
Vue.directive('on-clickaway', onClickaway)
/* eslint-disable */
new Vue({
  el: '#main-wrapper',
  router,
  store,
  data () {
    return {
      compName: null,
      response: null,
      menus: [
        {
          link: '/',
          icon: 'home',
          label: 'Объекты',
          select: false
        },
        {
          link: false, //'/deals',
          icon: 'deals',
          label: 'Сделки',
          select: false
        },
        {
          link: false, //'/stats',
          icon: 'stats',
          label: 'Статистика',
          select: false
        },
        {
          link: '/recent',
          icon: 'Heart',
          label: 'Избранные объекты',
          select: false
        },
        {
          link: '/selection',
          icon: 'Bookmarks',
          label: 'Подборки',
          select: false
        },
        {
          link: false, //'/chats',
          icon: 'chat',
          label: 'Чаты',
          select: false
        },
        {
          link: '/train',
          icon: 'GraduationCap',
          label: 'Система обучения',
          select: false
        },
        {
          link: false, //'/profile',
          icon: 'User',
          label: 'Мой профиль',
          select: false
        },
      ]
    }
  },
  computed: {
    compl () {
      return this.$store.getters.getCompl
    },
    uuid () {
      return this.$store.getters.getUid
    }
  },
  mounted() {
    this.$store.dispatch('LOAD_RECENT')
  },
  methods: {
    createCompilation () {
      $('#createCompl').modal('show')
    },
    sendCompilation () {
      axios.post('https://building-api.letsbot.ru/api/send-compl', {
        uuid: this.uuid,
        name: this.compName,
        ids: this.compl
      })
      this.compName = null
      this.response = 'Спасибо, ваша подборка сохранена. Можете перейти в раздел для работы с ней'
      $('#createCompl').modal('hide')
      $('#responseModal').modal('show')
    },
    clearResponse () {
      this.response = null
    }
  }
})
