<template>
  <div class="dropdown" v-on-clickaway="checkClick">
    <button class="btn btn-secondary dropdown-toggle" @click="show = !show" type="button">
      {{ values.length > 0 ? (values.length > 3 ? ('Выбрано '+values.length+' зн') : values.join(', ') ) : 'Не выбрано' }}
    </button>
    <div :class="'dropdown-menu' +(show?' show':'')">
      <a :class="'dropdown-item' + (values.indexOf('Неважно') !== -1 ? ' active':'')" @click="selectValue('Неважно')" href="#">{{ 'Неважно' }}</a>
      <a :class="'dropdown-item' + (values.indexOf(element) !== -1 ? ' active':'')" @click="selectValue(element)" href="#" v-for="element in elements" :key="element">{{ element }}</a>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
export default {
  name: "dropdownComponent",
  props: ['elements', 'value'],
  data () {
    return {
      show: false,
      values: []
    }
  },
  methods: {
    checkClick () {
      this.show = false
    },
    selectValue (val) {
      this.show = false
      if(val === 'Не важно') {
        this.values = []
        this.$emit('input', null);
      } else {
        if (this.values.indexOf(val) !== -1) {
          var key = this.values.indexOf(val)
          Vue.delete(this.values, key)
        } else {
          this.values.push(val)
        }
        this.$emit('input', this.values);
      }
    }
  }
}
</script>

<style scoped>
.dropdown-menu.show {
  width: 100%;
}
</style>