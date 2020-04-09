<template>
    <div> 
<!-- {{$store.state.entities.users.data}} -->
<v-container fluid>
<ProductList />
</v-container>
    </div>
</template>

<script>
import ProductForm from './ProductForm';
import ProductList from './ProductList';
    export default {
          asyncData () {
    return new Promise((resolve) => {
      setTimeout(function () {
        resolve({})
      }, 1000)
    })
  },
        components:{
            ProductForm,
            ProductList
        }
        
    }
</script>

<style lang="scss" scoped>
.application{
   font-family: 'Kanit', sans-serif;
}
</style>