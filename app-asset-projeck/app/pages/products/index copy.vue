<template>
  <div>
    <h1>Products</h1>
    <div>
      <!-- <b-table striped hover :items="items"></b-table> -->
       <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
    ></b-pagination>

    <p class="mt-3">Current Page: {{ currentPage }}</p>

      <!-- <b-table id="my-table" :busy="isBusy" 
      :items="myProvider" 
      :fields="fields"
      :per-page="perPage"
      :current-page="currentPage"
      > -->

    <b-table
      id="my-table"
      :items="items"
      :per-page="perPage"
      :current-page="currentPage"
      small
    >
          <template v-slot:table-busy>
        <div class="text-center text-danger my-2">
          <b-spinner class="align-middle"></b-spinner>
          <strong>Loading...</strong>
        </div>
        </template>
      </b-table>
    </div>
  </div>
</template>

<script>
export default {
  layout: 'adminLte',
  data() {
    return {
    itens:[],
      isBusy: false,
      fields: [
        {
          key: 'title',
          label: 'Person Full name',
          sortable: true,
          sortDirection: 'desc'
        },
        {
          key: 'url',
          label: 'Person age',
          sortable: true,
          class: 'text-center'
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
        { key: 'actions', label: 'Actions' }
      ],
      rows: 100,
        perPage: 10,
        currentPage: 1
    }
  },
  created() {
    this.myProvider()
  },
  computed: {
      rows() {
        return 5000
      }
    },
  methods: {
       toggleBusy() {
        this.isBusy = !this.isBusy
      },
    myProvider(ctx) {
      // Here we don't set isBusy prop, so busy state will be
      // handled by table itself
      // this.isBusy = true
      let promise = this.$axios.get(
        'https://jsonplaceholder.typicode.com/photos'
      )

      return promise.then(res => {
          const items = res.data
          console.log(res.data)
          return items
        })
        .catch(error => {
          r
          return []
        })
    }
  }
}
</script>

<style lang="scss" scoped>
</style>