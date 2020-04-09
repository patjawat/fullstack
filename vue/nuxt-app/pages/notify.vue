<template>
  <div>
    <h1>Notify</h1>
    <button @click="doNotify('pri')" type="button" class="btn btn-primary">click</button>
    <button @click="doNotify('success')" type="button" class="btn btn-success">click</button>
    <button @click="doNotify('warn')" type="button" class="btn btn-primary">click</button>
    <button @click="doNotify('error')" type="button" class="btn btn-danger">click</button>
    <notifications group="foo" position="bottom center"/>


  </div>
</template>

<script>
export default {
  data() {
    return {}
  },
  methods: {
      show () {
    this.$modal.show('hello-world');
  },
  hide () {
    this.$modal.hide('hello-world');
  },
    doNotify(type) {
      this.$notify({
        group: 'foo',
        type: type,
        title: 'Important message',
        text: 'Hello user! This is a notification!',
        });
    }
  }
}
</script>

<style lang="scss" scoped>
</style>