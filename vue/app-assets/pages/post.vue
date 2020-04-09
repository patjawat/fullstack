<template>
  <div>
    <h1 class="text-center">POST CRUD + Vuex-ORM</h1>
    <PostForm />
    <PostList />
    <ul>
      <ul>
    
    <button type="button" class="btn btn-primary" @click="loadApi">Load</button>
</ul>
<pre>
{{user}}
</pre>

    </ul>
  </div>
</template>

<script>
import PostForm from '../components/post/PostForm.vue'
import PostList from '../components/post/PostList'
import User from '@/models/User';

export default {
  components: {
    PostForm,
    PostList
  },
  computed: {
       users() {
          return User.api().getUser();
         
      },
      alluser(){
        return User.api().getAll();
      }
      

  },
  created() {
    this.loadApi();
  },
  methods: {
    async loadApi(){
        User.api().getUser();
        const result = await User.api().getUser();
        this.user = result.entities.users;

    },
  },
  data() {
    return {
      user:[]
    }
  },

}
</script>

<style lang="scss" scoped>

</style>