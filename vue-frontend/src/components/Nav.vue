<template>
  <div>
    <v-toolbar id="header" height="50"  
      app
      flat
      color="brown darken-2"
      dark
    >
    
      
      <router-link to="/" class="text-decoration-none mr-2">
        <v-btn 
          color="white"
          text
        >
        <span>Home</span>
        </v-btn>
      </router-link>
      

      <router-link to="/about" class="text-decoration-none mr-2">
        <v-btn 
          color="white"
          text
        >
        <span>About</span>
        </v-btn>
      </router-link>    

      <router-link to="/faq" class="text-decoration-none ml-2">
        <v-btn 
          color="white"
          text
        >
        <span>FAQ</span>
        </v-btn>
      </router-link>
      
      <router-link to="/order" class="text-decoration-none ml-2">
        <v-btn 
          color="white"
          text
        >
        <span>Menu</span>
        </v-btn>
      </router-link>

      <router-link to="/shopping-cart" class="text-decoration-none ml-2">
        <v-btn 
          color="white"
          text
        >
        <span>Shopping cart</span>
        </v-btn>
      </router-link>
        
    </v-toolbar>
    </div>
  
    
</template>
<script>
export default {
  name: 'Nav',
  data(){
    return {
      menuItems:[
        {
          name:'Home',
          route:'/'
        },
        {
          name:'About',
          route:'/about'
        },
        {
          name:'FAQ',
          route:'/faq'
        },
        {
          name:'Order',
          route:'/order'
        },
        {
          name:'Shopping cart',
          route:'/shopping-cart'
        }
      ]
    }
  }
}
</script>
<style lang="scss">
.v-toolbar__content {
  width:100%;
  display:flex;
  justify-content: center;
}


@media (min-width:536px){
  #header {
    display:block;
  }
  #mobile-menu, #mobile-menu-list {
    display:none;
  }
}

@media (max-width:535px){
  #header {
    display:none;
  }
  #mobile-menu, #mobile-menu-list {
    display:block;
  }

  .v-main {
  padding:0!important;
  }
}



</style>