<template>
  <div>
    <h1 class="text-center">CRUD VUEX</h1>
    <div class="container">
        <form @submit.prevent="onSubmit">
        <!-- row -->
      <div class="row"> 
        <div class="col-md-1-6">
          <div class="form-group">
            <label for>ชื่อสินค้า</label>
            <input type="text" class="form-control" placeholder="ระบุชื่อสินค้า ..."  v-model="form.name"/>
          </div>
        </div>

        <div class="col-md-1-6">
          <div class="form-group">
            <label for>ราคา</label></label>
            <input type="text" class="form-control" placeholder="ระบุราคา ..." v-model="form.price"/>
          </div>
        </div>

          <div class="col-md">
            <pre>{{form}}</pre>
            <hr>
            <pre>{{items}}</pre>
    </div>

      </div>
      <!-- end Row -->
      <button type="submit" class="btn btn-primary">Add</button>
</form>

<div class="row">
  <div class="col-xs-1-6">
    
  </div>
</div>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>ดำเนินการ</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
        </table>


    </div>
    <!-- end Container -->
  </div>
</template>

<script>
export default {
  name: 'Store',
  data() {
    return {
      form: {},
      items: []
    }
  },
 methods: {
     onSubmit(){
       this.items.push(this.form);
       this.formReset();
     },
     edit(){

     },
     delete(){
         
     },
     formReset(){
       this.form = {}
     }
 }
}
</script>

<style lang="scss" scoped>
</style>