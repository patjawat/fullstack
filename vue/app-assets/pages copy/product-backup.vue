<template>
  <div>
    <h1 class="text-center">CRUD Store</h1>
    <div class="container">
      <!-- start row -->
      <div class="row">
        <!-- start col -->
        <div class="col-md">
          <!-- form -->
          <!-- rows -->
          <form @submit.prevent="">
            <div class="row">
              <!-- col -->
              <div class="col-md">
                <div class="form-group">
                  <label for>ชื่อสินค้า</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="ระบุชื่อสินค้า"
                     ref="name"
                    v-model="form.name"
                    @input="updateMessage"
                  />
                </div>
              </div>
              <!-- end col -->
              <!-- col -->
              <div class="col-md">
                <div class="form-group">
                  <label for>ราคา</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="ระบุชื่อสินค้า"
                    ref="price"
                    v-model="form.price"
                    @input="updateMessage"
                  />
                </div>
              </div>
              <!-- end col -->
              <!-- col -->
              <div class="col-md">
                <div style="margin-top:29px;">
                <button
                  v-if="form.key >=0"
                  type="submit"
                  class="btn btn-warning"
                  @click="update"
                >Update</button>
                <button v-else type="submit" class="btn btn-primary" @click="add">Add</button>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </form>
          <!-- end form -->

          <table class="table">
            <thead>
              <tr>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>ดำเนินการ</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item,i) in listProduct" :key="i">
                <td scope="row">{{item.name}}</td>
                <td>{{item.price}}</td>
                <td>
                  <button type="submit" class="btn btn-warning" @click="editItem(i)">Edit</button>

                  <button type="submit" class="btn btn-danger" @click="delItem(i)">Del</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- end col      -->
        <!-- start col -->
        <div class="col-md">
          <h1>Total : {{this.listProduct.length}}</h1>
          <pre>{{form.ket}}</pre>
          <pre>{{listProduct}}</pre>
        </div>
        <!-- end col -->
      </div>
      <!-- end Row -->
    </div>
  </div>
</template>

<script>
import { mapGetters, mapState, mapActions } from 'vuex'
export default {
  layout: 'material',
  data() {
    return {
      items: [],
      listProduct: [],
      form:{}
  
    }
  },
  mounted() {
    this.listProduct = this.stateListItems
  },
  computed: {
    ...mapState({
      // message: state => state.MODULE_PRODUCT.message,
      stateListItems: state => state.MODULE_PRODUCT.items,
      // form: state => state.MODULE_PRODUCT.form,
      productSate: state => state.MODULE_PRODUCT
    })
  },
  ...mapGetters({
    GET_LIST_PRODUCT: 'GET_LIST_PRODUCT',
    GET_EDIT_STATUS: 'GET_EDIT_STATUS'
  }),

  methods: {
    ...mapActions({
      ACTION_ADD_ITEM: 'ACTION_ADD_ITEM',
      ACTION_EDIT_PRODUCT: 'ACTION_EDIT_PRODUCT',
      ACTION_DELETE_PRODUCT: 'ACTION_DELETE_PRODUCT',
      ACTION_CHANGE_FORM: 'ACTION_CHANGE_FORM'
 }),
      ...mapActions({
      ACTION_ADD_PRODUCT: 'ACTION_ADD_PRODUCT'
    }),
updateMessage (e) {
    
    this.ACTION_CHANGE_FORM(this.form);
 
  },
  // onSubmit(){
  //   if(this.form.key >= 0){
  //     alert('Update')
  //   }else{
  //     alert('Add')
  //   }
  // },
    add() {
      // สร้างตัวแปรเพื่อส่งค่าไปยัง action
      let data = {
        name: this.form.name,
        price: this.form.price
      }
      this.ACTION_ADD_PRODUCT(data)
      this.form = {}
     this.$refs.name.focus();
    
    },
    editItem(i) {
      this.edit = i
      let val = this.listProduct[i]
      this.form = {
        key:i,
        name: val.name,
        price: val.price
      }
      console.log(val)
    },
    update() {
       let param = {
        key:this.form.key,
        name: this.form.name,
        price: this.form.price
      }
      this.edit=null;
      this.form = {}
      this.ACTION_EDIT_PRODUCT(param)
    },

    delItem(i) {
      if (confirm('Are you sure you want to delete')) {
        // this.items.splice(i, 1)
        this.ACTION_DELETE_PRODUCT(i);
      }
    }
  }
}
</script>

<style lang="scss" scoped>
</style>