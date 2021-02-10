<template>
    <div>
        
 <form action="" @submit.prevent="submitForm">
     Post title :
     <br class="my-3">
     <input type="text" v-model="fields.title" class="form-control">
     <div class="alert alert-danger" v-if="errors.title">{{errors.title[0]}}</div>
     <br class="">
     Post text :
    <br class="my-3">
     <textarea  rows="5" v-model="fields.post_text" class="form-control"></textarea>
    <div class="alert alert-danger" v-if="errors.post_text">{{errors.post_text[0]}}</div>

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
     <div class="alert alert-danger" v-if="errors.Category_id">{{errors.Category_id[0]}}</div>

     <br><br>
     <br>
     <input type="submit" class="btn btn-secondary float-float-right" 
     :value="formSubmiting?'submiting...':'update post'"
     :disabled="formSubmiting" >


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
                 },
                errors:{},
                formSubmiting:false

            }
        },
        mounted(){
         this.getCategories()
         this.getFields()
        },
        methods:{
             getFields(){
                axios.get('/api/posts/'+this.$route.params.id).then(response=>{
                    this.fields=response.data.data
                })},
              getCategories(){
                axios.get('/api/categories').then(response=>{
                    this.categories=response.data.data
                })
              },
              submitForm(){
                  this.formSubmiting=true
                    axios.put('/api/posts/'+this.$route.params.id,this.fields).then(response=>{
                     router.push('/posts')
                    this.formSubmiting=false
                    }).catch(error=>{
                         if(error.response.status===422){
                            this.errors=error.response.data.errors
                            }
                            this.formSubmiting=false
                    })
              }
        }
    }
</script>

<style lang="scss" scoped>

</style>