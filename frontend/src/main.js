import Vue from 'vue'
import router from './router'
import store from './store'
import '../public/scss/style.scss'

Vue.config.productionTip = false

new Vue({
  el: '#main-wrapper',
  router,
  store,
  data () {
    return {
      menus: [
        {
          link: '/',
          icon: 'home',
          label: 'Объекты',
          select: false
        },
        {
          link: '/deals',
          icon: 'deals',
          label: 'Сделки',
          select: false
        },
        {
          link: '/stats',
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
          link: '/chats',
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
          link: '/profile',
          icon: 'User',
          label: 'Мой профиль',
          select: false
        },
      ]
    }
  }
})
