<template>
  <div>
    <h2>Counter : {{this.$store.state.counter}}</h2>
    <h2>photo : {{ JSON.stringify(this.$store.state.posts)}}</h2>

<button type="button" class="btn btn-primary" @click="getCouter">Click</button>
<button type="button" class="btn btn-primary" @click="getPhoto">Click</button>
<br>
    <NuxtLink to="/">
      Home
    </NuxtLink>
  </div>
</template>

<script>
import { mapGetters,mapState } from 'vuex'

export default {
  computed: {
  ...mapState({
    cars: state => state.cars.list,
    car: state => state.cars.car
  })
},
  methods: {
      getCar(){
          
      },

      getCouter(){
          this.$store.dispatch('addAction');
        //   alert('xx');

      },
       getPhoto(){
          this.$store.dispatch('getPhotoAction');
        //   alert('xx');

      }
  }
}
</script>

<style>
</style>
