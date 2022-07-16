import Vue from 'vue'
import router from './router'
import store from './store'
import '../public/scss/style.scss'
import { directive as onClickaway } from 'vue-clickaway'
// import { v4 as uuid } from 'uuid';

Vue.config.productionTip = false
Vue.directive('on-clickaway', onClickaway)

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
          link: false, //'/recent',
          icon: 'Heart',
          label: 'Избранные объекты',
          select: false
        },
        {
          link: false, //'/selection',
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
          link: false, //'/train',
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
  }, mounted() {
  }
})
