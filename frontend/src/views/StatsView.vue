<template>
<div class="container-fluid">
  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Количество активных объектов</h4>
        <div class="text-end">
          <h2 class="font-light mb-0">
            <i class="mdi mdi-arrow-up fs-2 text-success"></i> {{ stats.objects }}
          </h2>
          <span class="text-muted">всего</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Количество агентов</h4>
        <div class="text-end">
          <h2 class="font-light mb-0">
            <i class="mdi mdi-arrow-up fs-2 text-success"></i> {{ stats.agents }}
          </h2>
          <span class="text-muted">всего</span>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Посещения</h4>
          <div class="flot-chart">
            <div
                class="flot-chart-content"
                id="visited"
                style="padding: 0px; position: relative"
            >
              <canvas class="flot-base w-100" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Сделки</h4>
          <div class="flot-chart">
            <div
                class="flot-chart-content"
                id="leads"
                style="padding: 0px; position: relative"
            >
              <canvas class="flot-base w-100" width="400"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Рассылки</h4>
          <div class="flot-chart">
            <div
                class="flot-chart-content"
                id="links"
                style="padding: 0px; position: relative"
            >
              <canvas class="flot-base w-100" width="400"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Подборки</h4>
          <div class="flot-chart">
            <div
                class="flot-chart-content"
                id="compl"
                style="padding: 0px; position: relative"
            >
              <canvas class="flot-base w-100" width="400"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
/* eslint-disable */
import axios from "axios";

export default {
  name: "StatsView",
  data () {
    return {
      stats: {}
    }
  },
  mounted() {
    this.setReport()
    setInterval(()=>{
      this.setReport()
    }, 30*1000)
  },
  methods: {
    setReport() {
      axios.get('https://building-api.letsbot.ru/api/stats').then(resp => {
        this.stats = resp.data

        var options = {
          series: {
            lines: {
              show: true,
            },
            points: {
              show: true,
            },
          },
          xaxis: {
            autoScale: true,
            mode: "time",
            minTickSize: [1, "hour"],
            min: (new Date(2022, 6, 16, 20)).getTime(),
            max: (new Date(2022, 6, 17,25)).getTime(),
            twelveHourClock: false,
            timezone: "Europe/Moscow",
            timeBase: "milliseconds"
          },
          grid: {
            color: "#AFAFAF",
            hoverable: true,
            borderWidth: 0,
            backgroundColor: "#FFF",
          },
          tooltip: true,
          tooltipOpts: {
            content: "%y",
            shifts: {
              x: -60,
              y: 25,
            },
          },
        };
        $.plot(
            $("#visited"),
            [
              {
                data: resp.data.flot.visited,
                label: "Посещения",
              }
            ], options
        );
        $.plot(
            $("#leads"),
            [
              {
                data: resp.data.flot.leads,
                label: "Сделки",
              }
            ], options
        );
        $.plot(
            $("#links"),
            [
              {
                data: resp.data.flot.links,
                label: "Рассылки",
              }
            ], options
        );
        $.plot(
            $("#compl"),
            [
              {
                data: resp.data.flot.compl,
                label: "Подборки",
              }
            ], options
        );
      })
    }
  }
}
</script>

<style scoped>

</style>