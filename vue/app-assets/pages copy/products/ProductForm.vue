<template>
  <v-row>
    <v-dialog dialog persistent max-width="800px">
      <template v-slot:activator="{ on }">
        <v-btn color="primary" dark v-on="on">
          <v-icon large color="darken-2">mdi-plus</v-icon>เพิ่มสินค้าใหม่
        </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">
            <v-icon large color="darken-2">mdi-tooltip-edit</v-icon>แบบฟอร์มเพิ่มสินค้า
          </span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="รหัสสินค้า" v-model="form.code" required></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="ชื่อสินค้า"
                  v-model="form.name"
                  hint="example of helper text only on focus"
                ></v-text-field>
              </v-col>
              <!-- <v-col cols="12" sm="6" md="4">
                <v-text-field label="ราคาซื้อ" v-model="form.price" persistent-hint required></v-text-field>
              </v-col> -->
              <v-col cols="12" sm="8">
                <v-text-field label="รายละเอียดสินค้า" v-model="form.description" required></v-text-field>
              </v-col>

              <v-col cols="12" sm="4">
                <v-autocomplete
                  v-model="form.group_id"
                  :items="['ของใช้ทั่วไป', 'เครื่องปรุง', 'อาหารสำเร็จรูป', '54+']"
                  label="หมวดหมู่"
                  required
                ></v-autocomplete>
              </v-col>
              <v-col cols="12" sm="6">
                <v-text-field label="ราคาขาย" v-model.number="form.sale" persistent-hint required></v-text-field>

                <!-- <v-file-input v-model="form.files" @change="onFileChange" label="Select Image File..." accept="image/*"></v-file-input> -->
              <input type="file" @change="onFileChange" />
              </v-col>

              <v-col cols="12" sm="6">
                 <div id="preview">
    <img v-if="form.url" :src="url" />
  </div>
                <pre>
          {{form}}
          </pre>
              </v-col>
            </v-row>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <!-- <v-btn color="blue darken-1" text @click="dialog">Close</v-btn> -->
          <v-btn color="blue darken-1" text @click="onSubmit">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  
  </v-row>
</template>

<script>
import { mapGetters, mapSetters,mapActions} from 'vuex'
export default {
  name: 'ProductForm',
  props: [
    'form',
    'onSubmit',
    'onFileChange',
    'dialog',
  ],
  data() {
    return {
     
      // form: {}
    }
  },
  methods: {


  }
}
</script>

<style lang="scss" scoped>
</style>