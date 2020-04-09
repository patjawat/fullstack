<template>
  <div>
  <b-navbar toggleable="lg" type="dark" variant="info">
    <b-navbar-brand href="#">Vue-App</b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
      <nuxt-link class="nav-link" to="/about">About</nuxt-link>
      <nuxt-link class="nav-link" to="/customer">Customer</nuxt-link>
      <nuxt-link class="nav-link" to="/product">CRUD-Array</nuxt-link>
      <nuxt-link class="nav-link" to="/todo">Todo</nuxt-link>
      <nuxt-link class="nav-link" to="/pos">POS</nuxt-link>
      <nuxt-link class="nav-link" to="/crud">CRUD</nuxt-link>
      <nuxt-link class="nav-link" to="/notify">NotiFy</nuxt-link>
      <nuxt-link class="nav-link" to="/demo1/ex1">EX1</nuxt-link>
      <nuxt-link class="nav-link" to="/customer">customer</nuxt-link>
        <b-nav-item href="#" disabled>{{this.$store.state.counter}}</b-nav-item>
      </b-navbar-nav>

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-nav-form>
          <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
          <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
        </b-nav-form>
      <nuxt-link class="nav-link" to="/auth/login">Login</nuxt-link>
      <nuxt-link class="nav-link" to="/auth/register">Register</nuxt-link>
       <b-nav-item href="#" @click="logout">Logout</b-nav-item>


        <b-nav-item-dropdown text="Lang" right>
          <b-dropdown-item href="#">EN</b-dropdown-item>
          <b-dropdown-item href="#">ES</b-dropdown-item>
          <b-dropdown-item href="#">RU</b-dropdown-item>
          <b-dropdown-item href="#">FA</b-dropdown-item>
        </b-nav-item-dropdown>

        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template v-slot:button-content>
            <em>User</em>
          </template>
         <nuxt-link class="dropdown-item" to="/profile">Profile</nuxt-link>
          <b-dropdown-item href="#">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
    <nuxt />
  </div>
</template>

<script>
// import { mapGetters } from 'vuex'
export default {
  // computed: {
  //   ...mapGetters(['isAuthenticated', 'loggedInUser'])
  // },
  middleware:'auth',
  data() {
    return {
      
    }
  },
  methods: {
  async logout() {
    await this.$auth.logout();
  },
},
}
</script>
<style>

</style>
