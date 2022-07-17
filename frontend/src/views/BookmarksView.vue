<template>
  <div class="container-fluid">
    <div id="bookmarks" v-if="elements.length">
      <span class="header">Подборки ({{ found }})</span>
      <div class="col-12 row">
        <div @click="openObject(object)" class="object card col-4 mt-4 pointer" v-for="object in elements" :key="object.id" >
          <div class="row">
            <div class="col-6">{{object.ids? object.ids.length: 1}} объекта</div>
            <div class="col-6 text-right">{{ dateFormat(object.created_at) }}</div>
          </div>
          <div class="row">
            <div class="col-12 header">{{object.name}}</div>
          </div>
        </div>
      </div>
    </div>
    <div v-else-if="load" class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            {{found}} Идет загрузка данных, подождите немного
          </div>
        </div>
      </div></div>
    <div v-else class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body"> {{found}}
            Список подборок пока пустой
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
      elements: [],
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
        axios.get('https://building-api.letsbot.ru/api/get-compl?uuid='+this.uuid).then(response => {
          console.log(response)

          this.found = response.data.found
          this.elements = response.data.elements
          this.$forceUpdate()
          setTimeout(()=>{
            this.load = false
            this.$forceUpdate()
          }, 100)
        })
    }
  },
  mounted() {
    this.loadObjects()
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
#bookmarks {
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
    width: calc(100%/3 - 20px);
    margin-bottom: 0;



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