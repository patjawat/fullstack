<template>
    <div class="container">
        <h1>List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in posts" :key="item.i">
                    <td scope="row">{{key}}</td>
                    <td>{{item.title}}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import Post from '@/models/Post'
    export default {
        computed:{
            posts(){
                return Post.all();
            }
        },
        data() {
            return {
                
            }
        },
    
    }
</script>

<style lang="scss" scoped>

</style>