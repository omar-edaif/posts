<template>
    <div class="container">
      <select class="custom-select mb-3" v-model="category_id" >
        <option value="">--  Select Category  --</option>
        <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
      </select>
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
      <td>{{post.category_id}}</td>
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
     posts:{ },
     categories:{},
     category_id:""
        }
    },
    watch:{
      category_id(value){ this.getResults() }
      },
    mounted(){
      this.getCategories(),
      this.getResults()
     
   
    },

    methods:{
        getResults(page=1,category=this.category_id){
              axios.get('/api/posts?page='+page+'&Category_id='+category).then(response=>{
              this.posts=response.data
        })
        },
        getCategories(){
          axios.get('/api/categories').then(response=>{
              this.categories=response.data.data
              console.log(response.data.data)

          })
        }
      } 
    
    }
</script>

<style lang="scss" scoped>

</style>