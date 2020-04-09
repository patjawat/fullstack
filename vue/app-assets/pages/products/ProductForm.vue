<template>
  <div class="container">
    <v-row>
      <v-col cols="6">
        <v-form ref="form" v-model="valid" lazy-validation>
          <v-text-field v-model="name" :counter="10" :rules="nameRules" label="ชื่อสินค้า" required></v-text-field>

          <v-text-field v-model="codename" :rules="codenameRules" label="รหัสสินค้า" required></v-text-field>
          <v-text-field v-model="price" :rules="codenameRules" label="ราคาซื้อ" required></v-text-field>
          <v-text-field v-model="sale" :rules="codenameRules" label="ราคาขาย" required></v-text-field>

          <v-select
            v-model="product_group_id"
            :items="items"
            :rules="[v => !!v || 'Item is required']"
            label="Item"
            required
          ></v-select>

          <v-checkbox
            v-model="checkbox"
            :rules="[v => !!v || 'You must agree to continue!']"
            label="Do you agree?"
            required
          ></v-checkbox>

          <v-btn :disabled="!valid" color="success" class="mr-4" @click="onSubmit">บันทึก</v-btn>

          <v-btn color="error" class="mr-4" @click="reset">Reset Form</v-btn>

          <v-btn color="warning" @click="resetValidation">Reset Validation</v-btn>
        </v-form>
      </v-col>
      <v-col cols="6">
        <FormPhoto />
      </v-col>
    </v-row>
  </div>
</template>

<script>
import FormPhoto from '../../components/products/FormPhoto.vue'
import Product from '@/models/Product';
export default {
  components: {
    FormPhoto,
  },
  data: () => ({
    productList: [],
    valid: false,
    name: '',
    nameRules: [
      v => !!v || 'Name is required',
      v => (v && v.length <= 10) || 'Name must be less than 10 characters'
    ],
    codename: '',
    codenameRules: [
      v => !!v || 'Code Name is required',
      v => (v && v.length <= 10) || 'Name must be less than 10 characters'
    ],
    product_group_id: null,
    items: ['Item 1', 'Item 2', 'Item 3', 'Item 4'],
    checkbox: false
  }),
  created() {
    this.loadProduct();
  },
  methods: {
  
    validate() {
      if (this.$refs.form.validate()) {
        this.snackbar = true
      }
    },
    reset() {
      this.$refs.form.reset()
    },
    resetValidation() {
      this.$refs.form.resetValidation()
    },
    onSubmit() {
       if (this.$refs.form.validate() === true) {
         this.$nuxt.$loading.start()
         Product.api().post('/products',
           {
             name:this.name,
             codename:this.codename,
             price:this.price,
             sale:this.sale,
             product_group_id:this.product_group_id
           }
         )
              this.$router.push('/products');
   
      }
    },
    async loadProduct(){
      const res = await Product.api().getProduct();
      this.productList = res.response.data;
      console.log(res.response.data)
    }
  }
}
</script>

<style lang="scss">
</style>