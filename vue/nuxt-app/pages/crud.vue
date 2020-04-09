<template>
  <div class="container">
    <h1>CRUD {{edit}}</h1>
    <!-- {{Math.ceil(Math.random()*10)}} -->
    
    <form>
      <input type="text" v-model="form.name" />
      <input type="text" v-model="form.price" />
      <hr />
      <div v-if="edit === null">
        <button type="submit" class="btn btn-success" @click.prevent="onSubmit">Add</button>
      </div>
      <div v-else>
        <button type="button" class="btn btn-warning" @click.prevent="Update">Update</button>
      </div>
  <b-button v-b-modal.modal-1>Launch demo modal</b-button>
    </form>


  <b-modal id="modal-1" title="BootstrapVue">
    <p class="my-4">Hello from modal!</p>
  </b-modal>


    <div class="row">
      <div class="col-lg-6">
        <table class="table" in="my-table1">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Price</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item,i) in items" :key="i">
              <td>{{item.id}}</td>
              <td>{{item.name}}</td>
              <td>{{item.price}}</td>
              <td>
                <button type="button" class="btn btn-warning" @click="editItem(i)">Edit</button>
                <button type="button" class="btn btn-danger" @click="delItem(i)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>

        <b-pagination
          v-model="currentPage"
          :total-rows="rows"
          :per-page="perPage"
          aria-controls="my-table1"
        ></b-pagination>
      </div>
      <div class="col-lg-6">
        <div class="overflow-auto">
          <p class="mt-3">Current Page: {{ currentPage }}</p>

          <b-table
            id="my-table"
            :items="items"
            :fields="fields"
            :per-page="perPage"
            :current-page="currentPage"
            @row-dblclicked="expandAdditionalInfo"
            striped
            hover
            responsive
            small
          >   

                <template v-slot:cell(actions)="row">
        <b-button size="sm" @click="editItem(row.index)" class="mr-1">
          Info modal
        </b-button>
        <b-button size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
        </b-button>
      </template>


          </b-table>


          <b-pagination
            v-model="currentPage"
            :total-rows="rows"
            :per-page="perPage"
            aria-controls="my-table"
          ></b-pagination>
        </div>
      </div>
    </div>


  </div>
</template>

<script>


export default {
  data() {
    return {
      perPage: 3,
      currentPage: 1,
      items: [],
      edit: null,
     fields: [{
     key: "name",
     label: "ชื่อสินค้า",
     colType: "button"
   },
   {
     key: "price",
     label: "ราคา",
     colType: "span"
   },
      {
     key: "action",
     label: "action",
     colType: "button"
   },
    { key: 'actions', label: 'Actions' }
   ],
      form: {
        name: '',
        price: ''
      }
    }
  },
  methods: {
          show () {
    this.$modal.show();
  },
  hide () {
    this.$modal.hide('hello-world');
  },
    expandAdditionalInfo(row) {
  this.$bvModal.show('modal-1')
},
    viewProfile: function(id) {
      console.log('view profile with id:', id)
    },
    events: {
      'vuetable:action': function(action, data) {
        console.log('vuetable:action', action, data)
        if (action == 'view-item') {
          this.viewProfile(data.id)
        }
      },
      'vuetable:load-error': function(response) {
        console.log('Load Error: ', response)
      }
    },
    // บันทึก array
    onSubmit() {
      this.items.push(this.form)
      this.clearForm()
    },
    // ลบ array
    delItem(i) {
      if (confirm('Are you sure you want to delete')) {
        this.items.splice(i, 1)
      }
    },
    //แก้ไข
    editItem(i) {
      this.edit = i
      let item = this.items[i]
      this.form = {
        name: item.name,
        price: item.price
      }
      console.log('edit' + item.name)
    },
    //เปลี่ยนค่า array
    Update(i) {
      let key = this.edit
      let item = this.items[key]
      item.name = this.form.name
      item.price = this.form.price

      this.clearForm()
    },
    clearForm() {
      this.form = {}
      this.edit = null
    }
  },
  computed: {
    rows() {
      return this.items.length
    }
  }
}
</script>

<style lang="scss" scoped>
</style>