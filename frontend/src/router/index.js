import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import RecentView from '../views/RecentView.vue'
import BoardView from '../views/BoardView.vue'
import BookmarksView from '../views/BookmarksView.vue'
import LeadsView from '../views/LeadsView.vue'
import BookmarkView from '../views/BookmarkView.vue'
import ObjectView from '../views/ObjectView.vue'
import AuthView from '../views/AuthView.vue'
import ObjectsView from '../views/ObjectsView.vue'
import StatsView from '../views/StatsView.vue'
import StudentView from '../views/StudentView'
import StudentView2 from '../views/StudentView2'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/recent',
    name: 'Heart',
    component: RecentView
  },
  {
    path: '/board',
    name: 'home',
    component: BoardView
  },
  {
    path: '/object/:id',
    name: 'home',
    component: ObjectView
  },
  {
    path: '/train',
    name: 'GraduationCap',
    component: StudentView
  },
  {
    path: '/selection',
    name: 'Bookmarks',
    component: BookmarksView
  },
  {
    path: '/stats',
    name: 'stats',
    component: StatsView
  },
  {
    path: '/deals',
    name: 'deals',
    component: LeadsView
  },
  {
    path: '/selection/:id',
    name: 'Bookmarks',
    component: BookmarkView
  },
  {
    path: '/train/:id',
    name: 'GraduationCap',
    component: StudentView2
  },
  {
    path: '/object/:id',
    name: 'home',
    component: ObjectView
  },
  {
    path: '/visit/:hash',
    name: 'visit',
    component: ObjectsView
  },
  {
    path: '/auth',
    name: 'auth',
    component: AuthView
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
