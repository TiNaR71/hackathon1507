<template>
  <div class="container-fluid">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Выберите роль</h1>
                    </div>
                    <div class="row mt-2">
                      <button class="btn btn-warning mx-auto mx-md-0 text-white" @click="setRole('founder')">
                        Застройщик
                      </button>
                    </div>

                    <div class="row mt-2">
                    <button class="btn btn-primary mx-auto mx-md-0 text-white" @click="setRole('admin')">
                      Администратор
                    </button>
                  </div>
                    <div class="row mt-2">
                    <button class="btn btn-success mx-auto mx-md-0 text-white" @click="setRole('user')">
                      Агент/Гость
                    </button>
                </div>
                  </div>
                </div>
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
export default {
  name: 'AuthView',
  data () {
    return {
    }
  },
  computed: {
  },
  methods: {
    setRole (id) {
      this.$store.dispatch('SET_ROLE', id)
      if(id === 'founder') this.$router.push('/deals')
      else if(id === 'admin') this.$router.push('/stats')
      else this.$router.push('/')
    },
  },
}
</script>