<template>
  <div class="overflow-auto">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects</h3>

        <div class="card-tools">
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="collapse"
            data-toggle="tooltip"
            title="Collapse"
          >
            <i class="fas fa-minus"></i>
          </button>
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="remove"
            data-toggle="tooltip"
            title="Remove"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-1">

        <b-row>
    <b-col>
      <b-input-group size="sm">
          <b-form-input
            v-model="filter"
            type="search"
            id="filterInput"
            placeholder="ค้นหา"
          ></b-form-input>
          <b-input-group-append>
            <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
          </b-input-group-append>
        </b-input-group>
    </b-col>
    <b-col> 
      <nuxt-link to="products/create">เพิ่มสินค้าใหม่</nuxt-link>

    </b-col>
    <b-col>3 of 3</b-col>
  </b-row>

        <p class="mt-3">Current Page: {{ currentPage }}</p>

        
        <br />
        <b-table
          class="my-table-scroll"
          id="my-table"
          :busy="isBusy"
          :items="items"
          :fields="fields"
          :per-page="perPage"
          :current-page="currentPage"
          :filter="filter"
          :filterIncludedFields="filterOn"
          @filtered="onFiltered"
          responsive
          striped
          head-variant="light"
        >
          <!-- <template slot="" scope="props"> -->
          <template v-slot:cell(url)="row">
            <!-- <img src="https://cdn.auth0.com/blog/vuejs/vue-logo.png" alt="" width="50" height="50"> -->
            <div
              class="thumbnail fluid"
              v-bind:style="{backgroundImage: `url(${row.item.url})`, backgroundSize: 'cover', backgroundPosition: 'center',width:'100px',height:'100px'}"
            ></div>
          </template>

          <template v-slot:table-busy>
            <div class="text-center text-danger my-2">
              <b-spinner class="align-middle"></b-spinner>
              <strong>Loading...</strong>
            </div>
          </template>

          <template v-slot:cell(actions)="row">
            <a class="btn btn-primary btn-sm" href="#">
              <i class="fas fa-folder"></i>
              View
            </a>

            <a class="btn btn-info btn-sm" href="#">
              <i class="fas fa-pencil-alt"></i>
              Edit
            </a>

            <a class="btn btn-danger btn-sm" href="#">
              <i class="fas fa-trash"></i>
              Delete
            </a>
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
    <!-- End Card -->
  </div>
</template>

<script>
export default {
  layout: 'adminLte',

  data() {
    return {
      isBusy: false,
      perPage: 10,
      currentPage: 1,
      items: [],
      fields: [
        {
          key: 'url',
          label: 'Person age',
          sortable: true,
          class: 'text-center'
        },
        {
          key: 'title',
          label: 'Person Full name',
          sortable: true,
          sortDirection: 'desc'
        },

        {
          key: 'isActive',
          label: 'is Active',
          formatter: (value, key, item) => {
            return value ? 'Yes' : 'No'
          },
          sortable: true,
          sortByFormatted: true,
          filterByFormatted: true
        },
        {
          key: 'actions',
          label: 'Actions',
          tdClass: '',
          class: 'align-middle',
          thStyle: { backgroundColor: '#3eef33', width: '250px' }
        }
      ].map(o => ({
        ...o,
        url: `<img width="80" height="80" src="${o.url}"/>`
      })),
      filter: null,
      filterOn: []
    }
  },
  computed: {
    rows() {
      return this.items.length
    }
  },
  created() {
    this.loadItems()
  },
  methods: {
    loadItems() {
      this.toggleBusy()
      this.$axios
        .get('https://jsonplaceholder.typicode.com/photos')
        .then(res => {
          this.items = res.data
        })
        .then(() => {
          this.toggleBusy()
        })
    },
    toggleBusy() {
      this.isBusy = !this.isBusy
    }
    // onFiltered(filteredItems) {
    //     // Trigger pagination to update the number of buttons/pages due to filtering
    //     this.totalRows = filteredItems.length
    //     this.currentPage = 1
    //   }
  }
}
</script>

<style scoped>
.actionClass {
  max-width: 100px;
}
</style>