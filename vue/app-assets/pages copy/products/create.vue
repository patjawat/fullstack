<template>
  <div>
    <v-form v-model="valid">
      <v-container>
          
        <v-row>
          <v-col cols="12" md="3">
            <v-text-field
              v-model="form"
              :rules="nameRules"
              :counter="10"
              label="รหัสสินค้า"
              required
            ></v-text-field>
          </v-col>

          <v-col cols="12" md="5">
            <v-text-field v-model="lastname" :rules="nameRules" :counter="10" label="ชื่อ" required></v-text-field>
          </v-col>

          <v-col cols="12" md="4">
            <v-text-field v-model="email" :rules="emailRules" label="ราคา" required></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12" md="8">
            <v-text-field
              v-model="firstname"
              :rules="nameRules"
              :counter="10"
              label="ฺBarcoder"
              required
            ></v-text-field>
          </v-col>

          <v-col cols="12" md="4">
            <v-text-field
              v-model="lastname"
              :rules="nameRules"
              :counter="10"
              label="จำนวน"
              required
            ></v-text-field>
          </v-col>
        </v-row>
        <div class="my-2">
          <v-btn color="primary">บันทึก</v-btn>
        </div>
        {{msg}}
      </v-container>
    </v-form>
  </div>
</template>

<script>
export default {
   name: 'ProductForm',
  data() {
      return {
           form: {}
      }
  },
}
</script>

<style lang="scss" scoped>
</style>