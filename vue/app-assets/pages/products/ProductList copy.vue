<template>
<v-card>
    <v-card-title>
     <nuxt-link class="nav-link" to="/products/create">เพิ่มสินค้าใหม่</nuxt-link>
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon=""
        label=""
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>

  <v-data-table 
  :headers="headers" 
  :items="desserts" 
  :items-per-page="itemsPerPage"
  :search="search" 
  show-select 
  class="elevation-10">
  </v-data-table>


 <template v-slot:top>

<v-toolbar flat color="white">
        <v-toolbar-title>My CRUD</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator="{ on }">
            <v-btn color="primary" dark class="mb-2" v-on="on">New Item</v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.name" label="Dessert name"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.calories" label="Calories"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.fat" label="Fat (g)"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.carbs" label="Carbs (g)"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.protein" label="Protein (g)"></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
      
</template>

    </v-card>
</template>

<script>
import Product from '@/models/Product';
export default {
  data() {
    return {
        desserts:[],
        search: '',
        page: 1,
        pageCount: 0,
        itemsPerPage: 10,
        headers: [
          {
            text: 'Dessert (100g serving)',
            align: 'left',
            sortable: false,
            value: 'name',
          },
          { text: 'Calories', value: 'codename' },
          { text: 'Fat (g)', value: 'codename' },
          { text: 'Carbs (g)', value: 'codename' },
          { text: 'Protein (g)', value: 'codename' },
        ],
      }
  },
    created() {
    this.loadProduct();
  },
  methods: {
    async loadProduct() {
      const res = await Product.api().getProduct()
      this.desserts = res.response.data
      console.log(res.response.data)
    }
  }
}
</script>

<style lang="css">
</style>