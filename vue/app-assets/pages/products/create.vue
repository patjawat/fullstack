<template>
  <div>
    <ProductForm />
  </div>
</template>

<script>
import ProductForm from './ProductForm'
export default {
  asyncData() {
    return new Promise(resolve => {
      setTimeout(function() {
        resolve({})
      }, 800)
    })
  },
  components: {
    ProductForm
  }
}
</script>

<style lang="scss" scoped>
</style>