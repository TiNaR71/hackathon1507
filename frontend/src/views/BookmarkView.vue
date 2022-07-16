<template>
  <div class="container-fluid">
    <div id="objects" v-if="foundObjects.length">
      <span class="header">Подборка: {{object.name}} ({{object.ids.length}})</span>
      <div class="col-12 list row">
        <div class="object card col-4 mt-4" v-for="object in foundObjects" :key="object.id" >
          <div class="row">
            <input class="form-check-input" type="checkbox" v-model="checkbox[object.id]" @click="selectCheck(object.id)">
            <div @click="openObject(object)" class="col-4 d-flex pointer">
              <img :src="'https://ask-yug.com' + object.picture" alt="">
            </div>
            <div @click="openObject(object)" class="col-8 pointer">
              <div class="id">ID {{object.external_id}}</div>
              <div class="tag">Свободно</div>
              <label>Объект {{ object.object }}</label>
              <div class="parameters">
                Общая площадь <b>{{ object.square }} м²</b>
                <ul>
                  <li>Жилая площадь <b>{{ object.living }} м²</b></li>
                  <li><b>{{object.liter_name}}</b></li>
                  <li>Этаж <b>{{object.floor_number}}</b></li>
                  <li>№ кв. <b>{{object.humanized_type.split('№')[1]}}</b></li>
                  <li>Комн. <b>{{object.rooms_count}}</b></li>
                </ul>
              </div>
              <div class="price">2 531 750  ₽ </div>
            </div>
            <div class="col-12 pt-4">
              <div class="buttons">
                <div class="button bron" style="cursor: not-allowed">Забронировать</div>
                <div class="button like" @click="setRecent(object.id)"><i><svg width="20" height="20" viewBox="0 0 20 20" :fill="recentList.indexOf(object.id) !== -1?'red':'none'" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 16.875C10 16.875 2.1875 12.5 2.1875 7.18751C2.18766 6.24855 2.51301 5.33863 3.10824 4.61244C3.70347 3.88626 4.53183 3.38863 5.45249 3.20418C6.37315 3.01972 7.32928 3.15982 8.15832 3.60066C8.98736 4.04149 9.63814 4.75585 10 5.62227L9.99999 5.62228C10.3619 4.75585 11.0126 4.04149 11.8417 3.60066C12.6707 3.15983 13.6268 3.01973 14.5475 3.20418C15.4682 3.38863 16.2965 3.88625 16.8918 4.61244C17.487 5.33863 17.8123 6.24855 17.8125 7.18751C17.8125 12.5 10 16.875 10 16.875Z" stroke="#666565" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else-if="recentList.length > 0" class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            Идет загрузка объектов, подождите немного
          </div>
        </div>
      </div></div>
    <div v-else class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            Список избранного пока пустой
          </div>
        </div>
      </div></div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'BookmarkView',
  data () {
    return {
      found: 0,
      foundObjects: [],
      checkbox: {}
    }
  },
  computed: {
    objects () {
      return this.$store.getters.getObjects
    },
    recentList () {
      return this.$store.getters.getRecent
    },
    object () {
      return this.$store.getters.getObject
    }
  },
  methods: {
    selectCheck (id) {
      if(this.checkbox[id] === undefined) this.checkbox[id] = true
      else this.checkbox[id] = !this.checkbox[id]
      var checkbox = Object.keys(this.checkbox).filter((n) => {var val = this.checkbox[n]; return val !== false});
      this.$store.dispatch('SET_COMPL', checkbox)
      this.$forceUpdate()
    },
    openObject (object) {
      this.$store.dispatch('SET_OBJECT', object)
      this.$router.push('/object/'+object.id)
    },
    setRecent (id) {
      this.$store.dispatch('SET_RECENT', id)
    },
    loadObjects () {
      if(this.object.ids) {
        const params = {id: this.object.ids}
        axios.get('https://building-api.letsbot.ru/api/get-objects', {params}).then(response => {
          this.found = response.data.found
          this.foundObjects = response.data.elements
          this.$forceUpdate()
        })
      }
    }
  },
  mounted() {
    axios.get('https://building-api.letsbot.ru/api/get-comp?id='+this.$route.params.id).then(response => {
      this.$store.dispatch('SET_OBJECT', response.data)
      this.loadObjects()
    })
  },
  watch: {
    $route () {
      this.loadObjects()
    }
  }
}
</script>
<style lang="scss">
.dropdown button {
  display: inline-block;
  padding: 12px 24px;
  width: 100%;
  height: 44px;
  background: #F4F4F4;
  border-radius: 100px !important;
  color: #666565;
  border: none;
}
.input_box {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  padding: 0px;
  gap: 12px;

  height: 44px;

  input {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 12px 24px;
    gap: 10px;

    width: calc(50% - 10px);
    height: 44px;

    background: #F4F4F4;
    border-radius: 100px;

    flex: none;
    order: 0;
    flex-grow: 0;
    border: none;
  }
}
.text-input {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 12px 24px;
  gap: 10px;

  width: calc(100% - 10px);
  height: 44px;

  background: #F4F4F4;
  border-radius: 100px;

  flex: none;
  order: 0;
  flex-grow: 0;
  border: none;
}
.pointer {
  cursor: pointer;
}
#objects {
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
    font-family: 'Calibri';
    padding: 14px;
    height: auto;
    margin-right: 20px;
    flex: 0 0 auto;
    width: calc(100%/3 - 20px);
    margin-bottom: 0;
    max-width: 360px;
    input[type="checkbox"] {
      position: absolute;
      right: 12px;
      top: 12px;
      width: 17px;
      height: 17px;
      padding: 0;
      margin: 0;
    }
    img {
      max-width: 144px;
      margin-left: -14px;
      margin-top: -14px;
    }
    .tag {
      background: #C9D6F0;
      border-radius: 100px;
      width: auto;
      display: inline-block;
      padding: 2px 8px;
      margin-left: 20px;
    }
    .id {
      font-style: normal;
      font-weight: 400;
      font-size: 12px;
      line-height: 15px;
      display: inline-block;
      color: #1E1E1E;
    }
    label {

      font-style: normal;
      font-weight: 700;
      font-size: 14px;
      line-height: 17px;
      color: #1E1E1E;
    }
    .price {
      font-style: normal;
      font-weight: 700;
      font-size: 16px;
      line-height: 20px;
      color: #333333;
      padding-top: 8px;
    }
    ul {
      font-style: normal;
      font-weight: 400;
      font-size: 12px;
      line-height: 15px;
      color: #666565;
      padding-left: 0;
      margin-bottom: 0;
      li {
        display: inline-block;
        &::before,
        &::after {
          display: inline-block;
          content: "";
          width: 3px;
          height: 3px;
          background: #284F9A;
          border-radius: 50%;
          margin: 0 7px;
          margin-bottom: 2px;
        }
      }
    }
    .buttons  {
      display: flex;
      gap: 10px;
      .button {
        &.bron {

          padding: 12px 24px;
          width: 276px;
          height: 44px;

          background: #284F9A;
          border-radius: 100px;


          font-family: 'Calibri';
          font-style: normal;
          font-weight: 700;
          font-size: 16px;
          line-height: 20px;
          /* identical to box height */

          text-align: center;

          /* Белый */

          color: #FFFEFE;
        }
        &.like {
          background: #F4F4F4;
          width: 44px;
          height: 44px;
        }
      }
    }
  }
}
</style>