<template>
  <div class="container-fluid">
    <div id="bookmarks_objects" v-if="foundObjects.length">
      <span class="header">Подборка: {{object.name}} ({{object.ids.length}})</span>
      <div class="col-12 list row">
        <div class="object card col-3 mt-4"  @click="openObject(object)" v-for="object in foundObjects" :key="object.id" >
          <div class="row">
            <div class="col-12">
              <div class="d-block">
              <div class="id d-inline-block pointer">ID {{object.external_id}}</div>
              <div class="tag d-inline-block">Свободно</div>
              </div>
              <label class="pointer">Объект {{ object.object }}</label>
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
              <div class="price">{{ object.full_price }}  ₽ </div>
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
            Список подборки пока пустой
          </div>
        </div>
      </div></div>
    <div id="object"  class="mt-4 row col-12 card" v-if="objectInfo.id">
          <div class="card-body">
            <div class="row pb-5">
              <div class="col-12 text-center">
                <span class="header">О ОБЪЕКТЕ</span>
              </div>
            </div>
            <div class="row">
              <div class="col-6"><img :src="'https://ask-yug.com' + objectInfo.picture"></div>
              <div class="col-6">
                <div id="table">
                  <slot v-for="param in parameters">
                    <div class="row" :key="param.key" v-if="objectInfo[param.key]">
                      <div class="col-4 left">{{ param.text }}</div>
                      <div class="col-8 right">{{ objectInfo[param.key] }} </div>
                    </div>
                  </slot>
                </div>
              </div>
            </div>
          </div>
    </div>
    <img class="row col-12 pt-2 demo" src="https://building.letsbot.ru/Frame%203482.png" v-if="objectInfo.id">
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
      checkbox: {},
      objectInfo: {},
      parameters: [
        {
          text: 'Стоимость',
          key: 'full_price'
        },
        {
          text: 'Стоимость за м2',
          key: 'meter_price'
        },
        {
          text: 'Площадь',
          key: 'square'
        },
        {
          text: 'Жилая площадь',
          key: 'living'
        },
        {
          text: 'Кухня',
          key: 'kitchen'
        },
        {
          text: 'Количество комнат',
          key: 'rooms_count'
        },
        {
          text: 'Парковка',
          key: 'parking'
        },
        {
          text: 'Класс',
          key: 'class'
        },
        {
          text: 'Территория',
          key: 'territory'
        },
        {
          text: 'Район',
          key: 'districts'
        },
        {
          text: 'ЖК',
          key: 'object'
        },
        {
          text: 'Срок сдачи',
          key: 'humanized_ready_date'
        },
        {
          text: 'Адрес',
          key: 'address'
        }
      ]
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
      if (this.objectInfo.id === object.id) this.objectInfo = {}
      else this.objectInfo = object
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
#bookmarks_objects {
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
    //font-family: 'Calibri';
    padding: 14px;
    height: auto;
    margin-right: 20px;
    flex: 0 0 auto;
    width: calc(100%/3 - 20px);
    margin-bottom: 0;
    max-width: 208px;
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


          //font-family: 'Calibri';
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