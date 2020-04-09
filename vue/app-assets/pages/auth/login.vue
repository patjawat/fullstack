<template>
<v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card class="elevation-12">
              <v-toolbar
                color="primary"
                dark
                flat
              >
                <v-toolbar-title>Login form</v-toolbar-title>
                <v-spacer />
                <!-- <v-tooltip bottom>
                  <template v-slot:activator="{ on }">
                    <v-btn
                      :href="source"
                      icon
                      large
                      target="_blank"
                      v-on="on"
                    >
                      <v-icon>mdi-code-tags</v-icon>
                    </v-btn>
                  </template>
                  <span>Source</span>
                </v-tooltip> -->
                <!-- <v-tooltip right>
                  <template v-slot:activator="{ on }">
                    <v-btn
                      icon
                      large
                      href="https://codepen.io/johnjleider/pen/pMvGQO"
                      target="_blank"
                      v-on="on"
                    >
                      <v-icon>mdi-codepen</v-icon>
                    </v-btn>
                  </template>
                  <span>Codepen</span>
                </v-tooltip> -->
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field
                    label="Login"
                    name="login"
                    type="text"
                    v-model="form.username"
                  />

                  <v-text-field
                    id="password"
                    label="Password"
                    name="password"
                    type="password"
                    v-model="form.password"
                  />
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer />
                <v-btn color="primary" @click.prevent="onSubmit">Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
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