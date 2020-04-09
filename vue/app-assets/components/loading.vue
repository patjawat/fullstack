<template>
  <div v-if="loading" class="loading-page">
    <!-- <p>Loading...</p> -->
    <div class="text-center">
    <!-- <v-btn
      :disabled="dialog"
      :loading="dialog"
      class="white--text"
      color="purple darken-2"
      @click="dialog = true"
    >
      Start loading
    </v-btn> -->
    <v-dialog
      v-model="dialog"
      hide-overlay
      persistent
      width="300"
    >
      <v-card
        color="primary"
        dark
      >
        <v-card-text>
          Loading ... Please 
          <v-progress-linear
            indeterminate
            color="white"
            class="mb-0"
          ></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
  </div>


  
</template>

<script>
export default {
  data: () => ({
    loading: false,
    dialog: true,
  }),
  methods: {
    start () {
      this.loading = true
    },
    finish () {
      this.loading = false
    }
  }
}
</script>

<style scoped>
.loading-page {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding-top: 200px;
  font-size: 30px;
  font-family: sans-serif;
}
</style>
