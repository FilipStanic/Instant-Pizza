<template>
  <v-app>
    <Nav/>
    <CookieBanner id="cookieBanner"/>
    <v-main>
      <router-view id="router-view"/>
    </v-main>
    <Footer/>
  </v-app>
</template>

<script>
import Nav from './components/Nav'
import Footer from './components/Footer'
import CookieBanner from './components/CookieBanner'
export default {
  name: 'App',

  components: {
    Nav,
    Footer,
    CookieBanner
  },

  data: () => ({
    //
  }),
};
</script>
<style lang="scss">
  body {
    text-align: center;
  }
  #router-view {
    min-height: 80vh;
  }
</style>
