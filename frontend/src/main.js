import Vue from 'vue'
import router from './router'
import store from './store'
import '../public/scss/style.scss'
import { directive as onClickaway } from 'vue-clickaway'
import axios from "axios";
import QRCode from 'qrcode'

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
      openLeft: false,
      shareData: {},
      menus: []
    }
  },
  computed: {
    compl () {
      return this.$store.getters.getCompl
    },
    uuid () {
      return this.$store.getters.getUid
    },
    object () {
      return this.$store.getters.getObject
    },
    role () {
      return this.$store.getters.getRole
    }
  },
  mounted() {
    if(this.$route.path == '/founder') {
      this.$store.dispatch('SET_ROLE', 'founder')
      this.$router.push('/deals')
    }else if(this.$route.path == '/guest')
    {
      this.$store.dispatch('SET_ROLE', 'user')
      this.$router.push('/')
    }else if (this.$route.name !== 'visit' && this.role == 'unknown') {
      this.$router.push('/auth')
    }
    this.setMenu()
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
    },
    setRole (id) {
      this.$store.dispatch('SET_ROLE', id)
      if(id === 'founder') this.$router.push('/deals')
      else if(id === 'admin') this.$router.push('/stats')
      else if(id === 'unknown') location.reload()
      else this.$router.push('/')
    },
    shareObjects() {
      var ids = this.compl
      if(ids.length == 0 && this.object.id) {
        ids = [this.object.id]
      }
      axios.post('https://building-api.letsbot.ru/api/create-link', {
        uuid: this.uuid,
        ids: ids
      }).then(async response => {
        this.shareData = {
          title: 'Хакатон Строительство: LetsBot',
          text: 'Посмотри на эти чудестные объявления :)',
          url: 'https://building.letsbot.ru/visit/'+response.data.hash
        }
        try {
          await navigator.share(this.shareData)
        } catch(err) {

          var canvas = document.getElementById('canvas')

          QRCode.toCanvas(canvas, this.shareData.url, {scale: 10}, function (error) {
            if (error) console.error(error)
          })

          $('#shareModal').modal('show')
        }
      })
    },
    copyUrl() {
      var Url = document.getElementById('url'); /*GET vuejs el reference here (via $ref) but how?*/
      Url.select();
      document.execCommand("copy");

      this.response = 'Ссылка успешно скопирована'
      $('#responseModal').modal('show')
    },
    setMenu() {

      if(this.role == 'founder') {
        this.menus = [
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
          }
        ]
        this.$forceUpdate()
      }
      else if(this.role == 'admin') {
        this.menus = [
          {
            link: '/stats',
            icon: 'stats',
            label: 'Статистика',
            select: false
          }
        ]
        this.$forceUpdate()
      }
      else {
        this.menus = [
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
        this.$forceUpdate()
      }
    }
  },
  watch: {
    role () {
      console.log('role update')
      this.setMenu()
    }
  }
})
