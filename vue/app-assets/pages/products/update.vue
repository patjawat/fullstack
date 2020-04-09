<template>
    <div>
        <h1>Update</h1>
        <h1>Posts page id {{$route.params.id}}</h1>
        <ProductForm />
    </div>
</template>

<script>
import ProductForm from './ProductForm'

    export default {
          components: {
    ProductForm
  }
    }
</script>

<style lang="scss" scoped>

</style>