<template>
  <div>
    <button @click="asyncData()">Load Data</button>
    <h1>About {{ipaddress}}</h1>

<p>
      <button @click="$store.commit('increment')">
        {{ $store.state.counter }}
      </button><br>
      <NuxtLink to="/">
        Home
      </NuxtLink>
    <hr>
    <!-- {{this.$auth}} -->
    <h1>{{ this.$store.state.auth.loggedIn }}</h1>
    <h1>{{this.$store.state.auth.user}}</h1>
    <h1>{{this.$auth.loggedIn}}</h1>
    <hr>
    <h1>{{this.$store.state.isAuthenticated}}</h1>
  </div>
</template>

<script>
// import { mapGetters } from 'vuex'
export default {
  computed: {
    // ...mapGetters(['loggedInUser'])
  },
  // created() {
  //     this.asyncData();
  // },
  data() {
    return {
      ipaddress: '',
      login:this.$auth.loggedIn
    }
  },
  methods: {
    async asyncData() {
      const ip = await this.$axios.$get('users');
      this.ipaddress = ip
    // alert();
    }


  }
}
</script>

<style lang="scss" scoped>
</style>