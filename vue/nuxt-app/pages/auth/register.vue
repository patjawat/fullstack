<template>
    <div class=" container register-container">

 <form class="form-horizontal" @submit.prevent="onSubmit">
  <div class="form-group row">
    <label for="inputEmail3" class="ml-auto col-sm-2 col-form-label">username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Username" v-model="form.username">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" v-model="form.password">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            First radio
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Second radio
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
          <label class="form-check-label" for="gridRadios3">
            Third disabled radio
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-2">Checkbox</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          Example checkbox
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>

  <pre>
    {{form}}
  </pre>
    </div>
</template>

<script>


    export default {
        components: {
    // ValidationProvider
  },
      data() {
        return {
          value:'',
          form:{
            username:'',
            password:'',
            // firstName:'',
            // lastName:''
          }
        }
      },
      methods: {
        async onSubmit(){
           window.$nuxt.$root.$loading.start()
           console.log('validator', this.$validator)
          // if(!errors[0]){

            let data = {
              username:this.form.username,
            password:this.form.password,
          }
         let res =  await this.$axios.$post('/users-pg/register',data);
         setTimeout(function () {
        window.$nuxt.$root.$loading.finish();
         }, 1000)
        this.form = {}
        

        //   this.$router.push('/auth/login')
        // }
          }
      },
      //   validations: {
      //   form: {
      //     username: { required },
      //     password: { required }
      //   }
      // }
        
    }
</script>

<style lang="css" scoped>
.form-group {
    margin-bottom: 0px;
}
    .form-group > label {
      float: right;
 }
</style>