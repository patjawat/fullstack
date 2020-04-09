<template>
  <div>
    <h1>Customer Service :  {{name}}</h1>
    Counter : {{this.$store.state.MODULE_CUSTOMER.patjawat}}
    <hr>
    <pre>
        {{this.$store.state.MODULE_CUSTOMER.customerLIst}}
    </pre>
   <button @click="ACTION_GET_CUSTOMER" type="button" class="btn btn-primary">Load Customer</button>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    asyncData () {
    return new Promise((resolve) => {
      setTimeout(function () {
        resolve({ name: 'world' })
      }, 100)
    })
  },
  computed: {

  },
  data() {
      name:''
  },
  methods: {
      ...mapActions({
          ACTION_GET_CUSTOMER:'ACTION_GET_CUSTOMER'
      }),

  }
}
</script>

<style lang="scss" scoped>
</style>