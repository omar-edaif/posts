<template>
  <div>
 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/"> Laravel </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">              
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">Posts List</router-link>  
                    </li>
                
                    <li class="nav-item">
                        <router-link to="/posts/create" class="nav-link">Add new posts </router-link>  
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
      <div class="container">
         <router-view></router-view>
      </div>
    </main>
  </div>
</template>

<script>
  export default {
    
  }
</script>

<style lang="scss" scoped>

</style>