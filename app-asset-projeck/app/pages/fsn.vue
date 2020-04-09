<template>
  <div>
    <h1 class="text-center text-white">ระบบจัดการ FSN</h1>

    <div class="row">
      <div class="col-lg-6">
        <div class="card shadow-lg mb-5 bg-white rounded">
          <div class="card-header">
            <h5 class="card-title m-0">กลุ่มประเภท</h5>
          </div>
          <div class="card-body p-1">
  <Groupitems />
            <b-button variant="outline-primary" @click="toggleBusy"><i class="fas fa-plus"></i> เพิ่มเติม</b-button>

            <!-- <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>-->
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h5 class="card-title m-0">ชนิด</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Special title treatment</h6>
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's
              content.
            </p>

            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title m-0">รายละเอียด</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Special title treatment</h6>

            <p
              class="card-text"
            >With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
  </div>
</template>

<script>
import Groupitems from '~/components/fsn/Groupitems.vue'
export default {
  components: {
      Groupitems
  },

  data() {
    return {
      isBusy: false,
      fields: [
          {
            key: 'last_name',
            sortable: true
          },
          {
            key: 'first_name',
            sortable: false
          },
          {
            key: 'age',
            label: 'Person age',
            sortable: true,
            // Variant applies to the whole column, including the header and footer
            variant: 'danger'
          }
        ],
      items: [
        { isActive: true, age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
          { isActive: false, age: 21, first_name: 'Larsen', last_name: 'Shaw' },
          { isActive: false, age: 89, first_name: 'Geneva', last_name: 'Wilson' },
          { isActive: true, age: 38, first_name: 'Jami', last_name: 'Carney' }
      ]
    }
  },
  methods: {
    toggleBusy() {
      this.isBusy = !this.isBusy
    }
  }
}
</script>

<style lang="scss" scoped>
</style>