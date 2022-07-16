<template>
  <div class="container-fluid">
    <div class="row" v-if="Object.keys(data).length" :key="filterClear">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-4" style="min-width: 326px">
                <label class="form-control">Тип сделки</label>
                <div class="select-box" style="width: 326px;">
                  <div class="element select">Продажа</div>
                  <div class="element" style="cursor: not-allowed">Переуступка</div>
                  <div class="element" style="cursor: not-allowed">Аренда</div>
                </div>
              </div>
              <div class="col-8" style="min-width: 726px">
                <label class="form-control">Тип объекта</label>
                <div class="select-box" style="width: 726px;">
                  <div class="element select">Квартира</div>
                  <div class="element" style="cursor: not-allowed">Аппартаменты</div>
                  <div class="element" style="cursor: not-allowed">Коммерческое помещение</div>
                  <div class="element" style="cursor: not-allowed">Земельный участок</div>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-3" v-if="data.rooms_count">
                <label class="form-control">Комнат</label>
                <dropdown-component :elements="data.rooms_count" v-model="filter.room"></dropdown-component>
              </div>
              <div class="col-3" v-if="data.price && data.price.min && data.price.max">
                <label class="form-control">Стоимость, ₽</label>
                <div class="input_box">
                  <input type="number" placeholder="От" v-model="filter.price.min" :min="data.price.min" :max="data.price.max">
                  <input type="number" placeholder="До" v-model="filter.price.max" :min="data.price.min" :max="data.price.max">
                </div>
              </div>
              <div class="col-3" v-if="data.square && data.square.min && data.square.max">
                <label class="form-control">Площадь, м²</label>
                <div class="input_box">
                  <input type="number" placeholder="От" v-model="filter.square.min" :min="data.square.min" :max="data.square.max">
                  <input type="number" placeholder="До" v-model="filter.square.max" :min="data.square.min" :max="data.square.max">
                </div>
              </div>
              <div class="col-3" v-if="data.districts">
                <label class="form-control">Район</label>
                <dropdown-component :elements="data.districts" v-model="filter.districts"></dropdown-component>
              </div>
            </div>
            <div class="row">
              <div class="col-3" v-if="data.object">
                <label class="form-control">Жилой комплекс</label>
                <dropdown-component :elements="data.object" v-model="filter.objects"></dropdown-component>
              </div>
              <div class="col-3">
                <label class="form-control">Адрес</label>
                <input type="text" class="text-input" v-model="filter.address" placeholder="Введите адрес">
              </div>
              <div class="col-3" v-if="data.class">
                <label class="form-control">Класс</label>
                <dropdown-component :elements="data.class" v-model="filter.class"></dropdown-component>
              </div>
              <div class="col-3" v-if="data.humanized_ready_date">
                <label class="form-control">Статус объекта</label>
                <dropdown-component :elements="data.humanized_ready_date" v-model="filter.ready"></dropdown-component>
              </div>
            </div>
            <div class="row pt-5">
              <div class="col-8">
                <div class="buttons">
                  <div class="button active" @click="applyFilter">Найти объекты</div>
                  <div class="button" @click="clearFilter">Сбросить фильтр</div>
                </div>
              </div>
              <div class="col-4">
                <div class="show-more"  style="cursor: not-allowed">
                  <i class=""></i>
                  <span>Подробный фильтр</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            Идет загрузка фильтра, подождите немного
          </div>
        </div>
    </div></div>
    <div id="objects" v-if="foundObjects.length">
      <span class="header">Найдено {{ found }} объектов</span>
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
      <slot v-if="foundObjects.length > 0">
      <infinite-loading @infinite="infiniteHandler" :key="filterClear">
        <div slot="spinner">Загрузка...</div>
        <div slot="no-more"></div>
        <div slot="no-results">Нет данных</div>
      </infinite-loading>
      </slot>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import dropdownComponent from "@/components/dropdown"
import InfiniteLoading from 'vue-infinite-loading'

export default {
  name: 'HomeView',
  components: { dropdownComponent, InfiniteLoading},
  data () {
    return {
      filter: {
        room: [],
        price: {
          min: 0,
          max: 0
        },
        square: {
          min: 0,
          max: 0
        },
        districts: [],
        objects: [],
        address: null,
        class: [],
        ready: []
      },
      data: {},
      found: 0,
      filterClear: 0,
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
  },
  methods: {
    clearFilter () {
      this.filter = {
        room: [],
        price: {
          min: this.data.price.min,
          max: this.data.price.max
        },
        square: {
          min: this.data.square.min,
          max: this.data.square.max
        },
        districts: [],
        objects: [],
        address: null,
        class: [],
        ready: []
      }
      this.page = 0
      this.filterClear++
      this.$forceUpdate()
    },
    applyFilter () {
      const params = this.filter
      params.lastId = 0
      this.foundObjects = []
      axios.get('https://building-api.letsbot.ru/api/search', {params}).then(response => {
        this.found = response.data.found
        this.foundObjects = response.data.elements
        this.page = 1
      })
    },
    infiniteHandler($state) {
      const params = this.filter
      params.lastId = this.foundObjects[this.foundObjects.length-1].id
      axios.get('https://building-api.letsbot.ru/api/search', {params}).then(response => {
        this.found = response.data.found
        this.foundObjects = this.foundObjects.concat(response.data.elements)
        this.$forceUpdate()
        $state.loaded()
        if(response.data.elements.length < 20) $state.complete()
      })
    },
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
    }
  },
  watch: {
  },
  mounted() {
      axios.get('https://building-api.letsbot.ru/api/get-filter').then(response => {
        this.data = response.data
        this.filter.price.min = this.data.price.min
        this.filter.price.max = this.data.price.max
        this.filter.square.min = this.data.square.min
        this.filter.square.max = this.data.square.max
      })
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