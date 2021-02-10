import VueRouter from "vue-router";
import PostsIndex from "./components/Posts/Index.vue"
import PostsCreate from "./components/Posts/Create.vue"
import PostsEdit from "./components/Posts/Edit.vue"

export default new VueRouter({
 mode : 'history',
 routes:[
     {
         path:'/posts',
         component:PostsIndex,
         name:'posts_index'
     },
     {
        path:'/posts/create',
        component:PostsCreate,
        name:'posts_create'

     },,
     {
        path:'/posts/edite/:id',
        component:PostsEdit,
        name:'posts_edit'

     },
     
    ]

})