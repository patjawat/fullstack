<template>
  <div>
    <!-- <span class="group pa-2">
      <v-icon>home</v-icon>
      <v-icon>event</v-icon>
      <v-icon>info</v-icon>
    </span>-->
    <pre>
  <!-- {{this.$store.state.entities.product.data}} -->
</pre>
    <form @submit.prevent="submitFile">
      <!-- <input type="file" @change="onFileChange" /> -->
      <!-- <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/> -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <v-data-table
      :headers="headers"
      :items="desserts"
      :search="search"
      sort-by="calories"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat color="white">
          <v-toolbar-title>
            <v-icon>home</v-icon>รายการสินค้า
          </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <nuxt-link class="nav-link" to="/products/create">เพิ่มสินค้าใหม่</nuxt-link>

          <!-- <v-btn color="primary" dark class="mb-2" v-on="on">New Item</v-btn> -->

          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ on }">
              <v-btn color="primary" dark class="mb-2" v-on="on">เพิ่มสินค้าใหม่</v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="headline">{{ formTitle }}</span>
              </v-card-title>

              <v-card-text>
                <v-container>
                  <v-form ref="form" v-model="valid" lazy-validation>
                    <v-row>
                      <v-col cols="6" sm="6" md="6">
                        <v-text-field v-model="name" :rules="nameRules" label="ชื่อสินค้า"></v-text-field>
                      </v-col>
                      <v-col cols="6" sm="6" md="6">
                        <v-text-field v-model="codename" :rules="codenameRules" label="รหัสสินค้า"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="12" md="12">
                        <v-text-field v-model="price" :rules="priceRules" label="ราคาซื้อ"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="12" md="12">
                        <v-text-field v-model="sale" :rules="saleRules" label="ราคาขาย"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="12" md="12">
                        <v-select
                          v-model="product_group_id"
                          :items="items"
                          :rules="[v => !!v || 'Item is required']"
                          label="Item"
                          required
                        ></v-select>
                      </v-col>
                      <v-col cols="12" sm="12" md="12">
                        <!-- <input type="file" @change="onFileChange" /> -->
                        <input type="file" id="file" ref="file" v-on:change="handleFileUpload()" />

                        <div id="preview">
                          <img v-if="url" :src="url" />
                        </div>
                      </v-col>
                    </v-row>
                  </v-form>
                </v-container>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="save">Save</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-spacer></v-spacer>

          <v-text-field v-model="search" append-icon="search" label single-line hide-details></v-text-field>
        </v-toolbar>
      </template>

      <template v-slot:item.name="{ item }">
        <v-img
          src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
          gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)"
          max-height="200"
          max-width="200"
        ></v-img>
      </template>

      <template v-slot:item.action="{ item }">
        <v-btn color="primary" fab small dark @click="editItem(item)">
          <v-icon>mdi-pencil</v-icon>
        </v-btn>
        <v-btn fab small @click="deleteItem(item)">
          <v-icon>mdi-delete</v-icon>
        </v-btn>
      </template>
      <template v-slot:no-data>
      </template>
    </v-data-table>

    <confirm ref="confirm"></confirm>
    <dialog-loader ref="dialogLoader"></dialog-loader>
  </div>
</template>

<script>
import FormPhoto from '../../components/products/FormPhoto.vue'
import Product from '@/models/Product'

import DialogLoader from '@/components/DialogLoader'
import Confirm from '@/components/Confirm'
import HelloWorld from '@/components/products/HelloWorld'

import Post from '@/models/Post'

export default {
  components: {
    FormPhoto,
    Confirm,
    DialogLoader,
    HelloWorld
  },
  mounted() {
    this.$root.$confirm = this.$refs.confirm.open
    this.$root.$dialogLoader = this.$refs.dialogLoader
  },
  data: () => ({
    productItems: [],
    dialog: false,
    search: '',
    url: null,
    file: '',
    headers: [
      {
        text: 'รหัสสินค้า',
        align: 'left',
        sortable: false,
        value: 'codename'
      },
      {
        text: 'ชื่อสินค้า',
        align: 'left',
        sortable: false,
        value: 'name'
      },
      { text: 'ราคา', value: 'price' },
      { text: 'ราคาขาย', value: 'sale' },
      { text: 'กลุ่มสินค้า', value: 'product_group_id' },
      { text: 'Actions', value: 'action', sortable: false }
    ],
    id: null,
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
    price: '',
    priceRules: [
      v => !!v || 'Code Name is required',
      v => (v && v.length <= 10) || 'Name must be less than 10 characters'
    ],
    sale: '',
    saleRules: [
      v => !!v || 'Code Name is required',
      v => (v && v.length <= 10) || 'Name must be less than 10 characters'
    ],
    product_group_id: null,
    items: ['Item 1', 'Item 2', 'Item 3', 'Item 4'],

    desserts: [],
    // editedIndex: -1,
    form: {
      name: '',
      codename: '',
      price: '',
      sale: '',
      product_group_id: 0
    }
  }),

  computed: {
    formTitle() {
      return this.id ? 'แก้ไขสินค้า' : 'เพิ่มสินค้าใหม่'
    }
  },

  watch: {
    dialog(val) {
      val || this.close()
    }
  },

  created() {
    // this.initialize()
    this.loadProduct()
  },
  update() {},

  methods: {
    validate() {
      if (this.$refs.form.validate()) {
        this.snackbar = true
      }
    },
    reset() {
      this.$refs.form.reset()
    },
    async loadProduct() {
      const res = await Product.api().getProduct()
      this.desserts = res.response.data
      console.log(res.response.data)
    },
    editItem(item) {
      this.dialog = true
      var data = Object.assign({}, item)
      this.id = item.id
      this.name = item.name
      this.codename = item.codename
      this.price = item.price
      this.sale = item.sale
      this.product_group_id = item.product_group_id
      console.log(this.editedIndex)
    },

    async deleteItem(item) {
      if (
        await this.$root.$confirm(
          'Delete?',
          'Are you sure you want to delete with success?',
          { color: 'red' }
        )
      ) {
        this.$root.$dialogLoader.start(
          'Deleting...',
          {},
          () => {
            return new Promise((resolve, reject) => {
              Product.api()
                .delete('/products/' + item.id)
                .then(res => {
                  resolve()
                })
                .then(() => {
                  this.loadProduct()
                })
                .then(() => {
                  resolve()
                })
            })
          },
          true
        )
      }
    },

    close() {
      this.dialog = false
    },

    save() {
      let formData = new FormData()
      if (this.$refs.form.validate() === true) {
        if (this.id === null) {
          // let formData = new FormData()
          let rawData = {
            name: this.name,
            codename: this.codename,
            price: this.price,
            sale: this.sale,
            product_group_id: this.product_group_id
          }

          Product.api()
            .save({
              name: this.name,
              codename: this.codename,
              price: this.price,
              sale: this.sale,
              product_group_id: this.product_group_id
            })
            .then(res => {
              this.loadProduct()
            })
            .then(res => {
              this.reset()
              this.close()
            })
        } else {
          Product.api()
            .put('/products/' + this.id, {
              name: this.name,
              codename: this.codename,
              price: this.price,
              sale: this.sale,
              product_group_id: this.product_group_id
            })
            .then(res => {
              this.loadProduct()
            })
            .then(res => {
              this.reset()
              this.close()
            })
        }
      }
    },
    delete() {}
  }
}
</script>

<style lang="css">
#preview > img {
  max-width: 200px;
  max-height: 200px;
}
</style>