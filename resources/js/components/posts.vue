<template>
    <div class="container">
     <table class="table">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">dscription</th>
      <th scope="col">create at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="post in posts.data" :key="post.id">
      <th scope="row">{{post.title}}</th>
      <td>{{ post.post_text}}</td>
      <td>{{post.created_at}}</td>
      <td></td>
    </tr>

 </tbody>
</table>

<pagination :data="posts" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<script>
    export default {
       
    data(){
        return{
     posts:{ }
        }
    },
    mounted(){
      this.getResults()
   
    },
    methods:{
        getResults(page=1){
              axios.get('/api/posts?page='+page).then(response=>{
              this.posts=response.data
        })
        }
      } 
    
    }
</script>

<style lang="scss" scoped>

</style>