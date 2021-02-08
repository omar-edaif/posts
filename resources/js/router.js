import VueRouter from "vue-router";
import PostsIndex from "./components/Posts/Index.vue"
import PostsCreate from "./components/Posts/Create.vue"

export default new VueRouter({
 mode : 'history',
 routes:[
     {
         path:'/',
         component:PostsIndex
     },
     {
        path:'/create',
        component:PostsCreate

     },
     
    ]

})