<template>
  <div>
    <h3 class="text-center">ข้อมูลสินค้า</h3>
    <!-- start row -->
    <div class="row">
      <!-- start col -->
      <div class="row">
        <!-- form -->
        <v-col cols="12" md="6">
          <ProductForm :form="form" :onSubmit="onSubmit" :dialog="dialog" :onFileChange="onFileChange"/>
        </v-col>

        <v-col cols="12" md="6" >
          <h3>สินค้า : {{this.productStore.items.length}} รายการ</h3>
        </v-col>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>ชื่อสินค้า</th>
              <th>ราคา</th>
              <th>ดำเนินการ</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item,i) in productStore.items" :key="i">
              <td>
                <img
                  src="https://image.freepik.com/free-photo/wooden-board-empty-table-top-blurred-background_1253-1584.jpg"
                  alt
                  width="100"
                />
              </td>
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
      <!-- end col -->
    </div>
    <!-- end Row -->
    <div>
            <div class="file-upload-form">
                Upload an image file:
                <input type="file" @change="previewImage" accept="image/*">
            </div>
            <div class="image-preview" v-if="imageData.length > 0">
                <img class="preview" :src="imageData">
            </div>
        </div>
        
  </div>

  
</template>

<script>
import { mapGetters, mapState, mapActions } from 'vuex'
import ProductForm from './productForm'
export default {
  components: {
    ProductForm
  },
  layout: 'material',
  data() {
    return {
      items: [],
      listProduct: [],
      dialog:false,
      imageData: "",
      form: {
        code: '',
        name: '',
        price:null,
        sale: null,
        group_id: '',
        files:null,
        description: '',
      }
    }
  },
  mounted() {
    this.listProduct = this.stateListItems
    this.ACTION_GET_PRODUCT()
  },
  computed: { // update ค่าล่าสุด
    ...mapState({
      stateListItems: state => state.MODULE_PRODUCT.items,
      productStore: state => state.MODULE_PRODUCT
    })
  },

  methods: {
    ...mapActions({
      ACTION_GET_PRODUCT: 'ACTION_GET_PRODUCT',
      ACTION_ADD_PRODUCT: 'ACTION_ADD_PRODUCT',
      ACTION_EDIT_PRODUCT: 'ACTION_EDIT_PRODUCT',
      ACTION_DELETE_PRODUCT: 'ACTION_DELETE_PRODUCT',
      ACTION_CHANGE_FORM: 'ACTION_CHANGE_FORM'
    }),
    ...mapGetters({
      PRODUCTS:'PRODUCTS'
    }),
    updateMessage(e) {
      this.ACTION_CHANGE_FORM(this.form)
    },
    loadProduct(){
      this.ACTION_GET_PRODUCT()
    },

    // add() {
    //   // สร้างตัวแปรเพื่อส่งค่าไปยัง action
    //   let data = {
    //     name: this.form.name,
    //     price: this.form.price
    //   }
    //   this.ACTION_ADD_PRODUCT(data)
    //   this.form = {}
    //   this.$refs.name.focus()
    // },
     previewImage: function(event) {
            // Reference to the DOM input element
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.imageData = e.target.result;
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        },
        onSubmit(){
      this.ACTION_ADD_PRODUCT(this.form);
      this.form = {}
      this.dialog = false;
      this.ACTION_GET_PRODUCT()
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.form.url = URL.createObjectURL(file);
      console.log(e.target.files[0])
    },
    editItem(i) {
      this.edit = i
      let val = this.listProduct[i]
      this.form = {
        key: i,
        name: val.name,
        price: val.price
      }
      console.log(val)
    },
    update() {
      let param = {
        key: this.form.key,
        name: this.form.name,
        price: this.form.price
      }
      this.edit = null
      this.form = {}
      this.ACTION_EDIT_PRODUCT(param)
    },

    delItem(i) {
      if (confirm('Are you sure you want to delete')) {
        // this.items.splice(i, 1)
        this.ACTION_DELETE_PRODUCT(i)
      }
    }
  }
}
</script>

<style lang="scss" scoped>
</style>