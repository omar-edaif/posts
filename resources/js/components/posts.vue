<template>
    <div class="container">
      <select class="custom-select mb-3" v-model="category_id" >
        <option value="">--  Select Category  --</option>
        <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
      </select>
     <table class="table">
  <thead>
    <tr>
      <th scope="col">
        <a  href="#" @click.prevent="changeSort('title')"> title</a >
        <span v-if="sort_field === 'title' && sort_direction==='desc'"> &uarr; </span>
        <span v-if="sort_field === 'title' && sort_direction==='asc'"> &darr; </span>
        </th>
      <th scope="col"> 
       <a  href="#" @click.prevent="changeSort('post_text')"> discription</a >
        <span v-if="sort_field === 'post_text' && sort_direction==='desc'"> &uarr; </span>
        <span v-if="sort_field === 'post_text' && sort_direction==='asc'"> &darr; </span>
        </th>
      <th scope="col"> 
       <a  href="#" @click.prevent="changeSort('created_at')"> created at</a >
        <span v-if="sort_field === 'created_at' && sort_direction==='desc'"> &uarr; </span>
        <span v-if="sort_field === 'created_at' && sort_direction==='asc'"> &darr; </span>
        </th>
      <th scope="col"> 
        <a  href="#"> Actions</a >
        </th>
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
     category_id:'',
     sort_field :'created_at',
     sort_direction:'desc'
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
        getResults(page=1,category=this.category_id,sortField=this.sort_field,sortDirection = this.sort_direction){
              axios.get(
                '/api/posts?page='+page+'&Category_id='+category
                +'&sort_field='+sortField
                +'&sort_direction='+sortDirection
                ).then(response=>{
              this.posts=response.data
        })
        },
        getCategories(){
          axios.get('/api/categories').then(response=>{
              this.categories=response.data.data
          

          })
        },
        changeSort(sortField){
         if(this.sort_field===sortField){
           this.sort_direction = this.sort_direction==='asc'?'desc':'asc'
         }
         else{
           this.sort_field=sortField
           this.sort_direction = 'asc'
         }
         this.getResults()
        }
      } 
    
    }
</script>

<style lang="scss" scoped>

</style>