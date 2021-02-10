<template>
    <div>
 <form action="" @submit.prevent="submitForm">
     Post title :
     <br class="my-3">
     <input type="text" v-model="fields.title" class="form-control">
     <br class="">
     Post text :
    <br class="my-3">
     <textarea  rows="5" v-model="fields.post_text" class="form-control"></textarea>
    <br class="">
     Category :
     <br class="my-3">
     <select class="custom-select" v-model="fields.Category_id">
         <option value="">-- select categories--</option>
         <option v-for="category in categories" 
                :key="category.id" 
                :value="category.id">
                {{category.name}} </option>
     </select>
     <br><br>
     <br><input type="submit" class="btn btn-primary float-float-right" value="Save post">

 </form>
    </div>
</template>

<script>
        import router from '../../router'

    export default {
        data(){
            return{
                categories :"",
                fields:{
                    title:"",
                    post_text:"",
                    Category_id:""
                }

            }
        },
        mounted(){
         this.getCategories()
        },
        methods:{
              getCategories(){
                axios.get('/api/categories').then(response=>{
                    this.categories=response.data.data
                })
              },
              submitForm(){
                    axios.post('/api/posts',this.fields).then(response=>{
                        
                       router.push('/')
                       console.log(response.status)
                                               
                    })
              }
        }
    }
</script>

<style lang="scss" scoped>

</style>