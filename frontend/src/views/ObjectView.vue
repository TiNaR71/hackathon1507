<template>
  <div class="container-fluid" id="object">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row pb-5">
              <div class="col-12 text-center">
                <span class="header">О ОБЪЕКТЕ</span>
              </div>
            </div>
            <div class="row">
              <div class="col-6"><img :src="'https://ask-yug.com' + object.picture"></div>
              <div class="col-6">
                <div id="table">
                  <slot v-for="param in parameters">
                  <div class="row" :key="param.key" v-if="object[param.key]">
                    <div class="col-4 left">{{ param.text }}</div>
                    <div class="col-8 right">{{ object[param.key] }} </div>
                  </div>
                  </slot>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img class="pt-2" src="https://building.letsbot.ru/Frame%203482.png" alt="">
  </div>
</template>

<script>

import axios from "axios";

export default {
  name: 'BookmarkView',
  components: {},
  data () {
    return {
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
    object () {
      return this.$store.getters.getObject
    }
  },
  methods: {
  },
  mounted() {
    if(this.object.id == undefined) {
      axios.get('https://building-api.letsbot.ru/api/get-object?id='+this.$route.params.id).then(response => {
        this.$store.dispatch('SET_OBJECT', response.data)
      })
    }
  }
}
</script>
<style lang="scss">
#object {
  img {
    width: 100%;
    height: auto;
  }
  .header {
    font-family: 'Calibri';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 24px;

    /* Черный */

    color: #1E1E1E;

  }
  #table {

    border: 1px solid #C9D6F0;
    border-radius: 5px;
    .row {
      margin: 0;
      /* Белый */

      background: #FFFEFE;
      /* Светло-синий */
      &:not(:last-child) {
        border-bottom: 1px solid #C9D6F0;
        border-radius: 0px;
      }

      font-family: 'Calibri';
      font-style: normal;
      font-size: 16px;
      line-height: 20px;
      color: #1E1E1E;
      .left {
        padding: 16px 0 16px 20px;
        font-weight: 700;
      }
      .right {
        font-weight: 400;
        padding: 16px 20px 16px 0px;
        text-align: right;

      }
    }
  }
}
</style>