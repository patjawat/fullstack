<template>
  <div class="container">
    <div class="form-group">
      <label for></label>
      <input type="text" v-model="title" class="form-control" placeholder aria-describedby="helpId" />
      <button type="button" class="btn btn-primary" @click="add">Add</button>
    </div>
  </div>
</template>

<script>
import Post from '@/models/Post'

export default {
  data() {
    return {
      title: ''
    }
  },
  methods: {
      add() {
          Post.insert({
              data:{title: 'xxx'}
          });
          this.title = '';
        // alert('xx');
      }
  }
}
</script>

<style lang="scss" scoped>
</style>