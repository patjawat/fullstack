<template>
  <div class="container" style="margin-top:20px;">
  <b-form-input v-model="text" placeholder="Enter your name"></b-form-input>
    <div class="mt-2">Value: {{ text }}</div>
    <button @click="addItem" class="btn btn-primary" type="submit">Add</button>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Items</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item,index) in items" :key="index">
          <td>{{index}}</td>
          <td>{{item}}</td>
          <td>
            <button class="btn btn-warning">Edit</button>
            <button @click="delItem(index)" class="btn btn-danger">Del</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>

export default {
  data() {
    return {
      text:'',
      items:[]
    }
  },
  methods: {
    addItem(){
      this.items.push(this.text)
      this.text = '';
    },
     delItem(index){
    this.items.splice(index,1);
  }
  },
 
}
</script>

<style>
</style>
