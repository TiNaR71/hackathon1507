<template>
  <div class="container-fluid">
    <div id="deals" v-if="foundObjects.length">
      <span class="header">Сделки ({{ found }})</span>
      <div class="col-12 row">
      <div class="object card col-6 mt-4" v-for="object in foundObjects" :key="object.id" >
        <div class="row">
        <div class="col-3" style="max-width: 70px"><img src="https://building.letsbot.ru/avatar.png" class="demo"></div>
        <div class="col-9" style="width: calc(100% - 70px)">
          <div class="row"><div class="col-12"><div :key="tag" v-for="(tag, index) in object.tags" :class="index === 0? 'tag d-inline-block active':'tag d-inline-block'">{{ tag }}</div></div></div>
          <div class="row">
            <div class="col-6"><div class="header d-inline-block">{{object.object.humanized_name}}</div><div class="d-inline-block ms-2">{{[object.name, object.description].join(', ')}}</div><h3 style="color: black">{{object.object.full_price}} ₽</h3></div>
            <div class="col-6 text-right">{{ dateFormat(object.created_at) }}</div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    <div v-else-if="load" class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            Идет загрузка сделок, подождите немного
          </div>
        </div>
      </div></div>
    <div v-else class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            Список сделок пока пустой
          </div>
        </div>
      </div></div>
  </div>
</template>

<script>
import axios from 'axios'
import moment from 'moment'
import 'moment/locale/ru'

export default {
  name: 'BookmarksView',
  data () {
    return {
      found: 0,
      foundObjects: [],
      checkbox: {},
      load: false
    }
  },
  computed: {
    uuid () {
      return this.$store.getters.getUid
    }
  },
  methods: {
    dateFormat (value) {
      return moment(value).format('DD.MM.YYYY')
    },
    openObject (object) {
      this.$store.dispatch('SET_OBJECT', object)
      this.$router.push('/selection/'+object.id)
    },
    loadObjects () {
      this.load = true
        axios.get('https://building-api.letsbot.ru/api/get-leads?uuid='+this.uuid).then(response => {
          this.found = response.data.found
          this.foundObjects = response.data.elements
          this.load = false
          this.$forceUpdate()
        })
    }
  },
  mounted() {
    this.loadObjects()
    setInterval(() => {
      this.loadObjects()
    }, 10000)
  },
  watch: {
    $route () {
      this.loadObjects()
    }
  }
}
</script>
<style lang="scss">
.text-right {
  text-align: right;
}
#deals {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0px;
  gap: 20px;
  .header {
    height: 24px;

    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 24px;

    /* Черный */

    color: #1E1E1E;

  }
  .object {
    padding: 14px;
    height: auto;
    margin-right: 20px;
    flex: 0 0 auto;
    width: calc(100%/2 - 20px);
    margin-bottom: 0;


    .tag {
      &.active {
        background: #E6F9E3;
      }
      &:not(.active) {
        border: 1px solid #163062;
      }
      border-radius: 100px;
      width: auto;
      display: inline-block;
      padding: 2px 8px;
      margin-left: 10px;

      //font-family: 'Calibri';
      font-style: normal;
      font-weight: 400;
      font-size: 12px;
      line-height: 15px;
    }

    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 19px;
    /* identical to box height */


    color: #666565;
    .header {
      //font-family: 'Calibri';
      font-style: normal;
      font-weight: 700;
      font-size: 16px;
      line-height: 20px;
      /* identical to box height */


      /* Черный */

      color: #1E1E1E;

    }
  }
}
</style>