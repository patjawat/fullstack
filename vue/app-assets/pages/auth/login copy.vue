<template>
    <div class="container">
<h1>Login</h1>
  <b-form @submit.prevent="onSubmit" @reset="onReset" v-if="show">
      <b-form-group
        id="input-group-1"
        label="Username"
        label-for="input-1"
      >
        <b-form-input
          id="input-1"
          v-model="form.username"
          type="text"
          required
          placeholder="Enter Username"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Password" label-for="input-2">
        <b-form-input
          id="input-2"
          type="password"
          v-model="form.password"
          required
          placeholder="Enter password"
        ></b-form-input>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
    {{auth}}
  <h1>{{this.$auth.loggedIn}} xx</h1>
  </div>

</template>


<script>
  export default {
    layout: 'public',
    data() {
      return {
        form: {
          username: '',
          password: '',
        },
        auth:'',
        show: true
      }
    },
    methods: {
    onSubmit(evt) {
        evt.preventDefault()
        // let data = {
        //     username : this.form.username,
        //     password : this.form.password
        // }
      //  let res= await this.$axios.$post('http://127.0.0.1:4000/users/authenticate',data);
      //   this.auth = res;
      this.$auth.loginWith('local', {
        data: {
          username : this.form.username,
          password : this.form.password
        }
      })

      },

      async onSubmit11() {
      const ip = await this.$axios.$post(
        'http://127.0.0.1:4000/users-pg/authenticate'
      )
      this.$router.push('/')
      // this.ipaddress = ip
    // alert();
    },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
        this.form.password = ''
        this.form.usernamename = ''
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>