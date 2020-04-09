<template>
<div>
  <h1 class="text-center">V-POST</h1>

  <div v-if="$auth.logedIn">
<h1 class="text-center">Login Success</h1>
  </div>

  <div v-else>
<h1 class="text-center">
  register
</h1>
  </div>
</div>

</template>

<script>
import Logo from '~/components/Logo.vue'

export default {
  components: {
    Logo
  }
}
</script>

<style>

</style>
