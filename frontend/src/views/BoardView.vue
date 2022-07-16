<template>
  <div class="container-fluid" id="board">
    <img class="pt-2" src="https://building.letsbot.ru/Frame%20471.png" alt="">
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'BoardView',
  components: {},
  data () {
    return {
      filter: {
        objects: []
      },
      data: {},
      found: 0,
      filterClear: 0,
      foundObjects: []
    }
  },
  computed: {
    objects () {
      return this.$store.getters.getObjects
    }
  },
  methods: {
    selectObject (object) {
      this.filter.objects = []
      this.filter.objects.push(object)
      this.$forceUpdate()
      // this.applyFilter()
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
  },
  mounted() {
      axios.get('https://building-api.letsbot.ru/api/get-filter').then(response => {
        this.data = response.data
      })
  }
}
</script>
<style lang="scss">
#board {
  .select-box {
    background: #fff;
    .element {
      width: auto;
      &.select {
        background: #284F9A;
        color: #FFFFFF;
      }

      &:hover {
        background: #284F9A !important;
        color: #FFFFFF !important;
      }
    }

    &:hover .element {
      &.select {
        background: transparent;
        color: #284F9A;
      }
    }
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
  }
}
</style>