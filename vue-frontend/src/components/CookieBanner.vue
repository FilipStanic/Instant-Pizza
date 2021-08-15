<template>
  <div v-if="CookiePromptDisplay">
    <v-card id="cookieBanner" class="pt-0 pr-0 pb-0 pl-0"> 
      <div class="d-flex justify-center  align-center blue pt-5 pb-5">
        <span class="ml-5 mr-10 white--text">Our site uses cookies. By browsing this site, you consent to the use of these cookies.</span>
        <v-btn
        class="white blue--text mr-5"
        @click="toggleCookiePrompt"
        >
          OK
        </v-btn>
      </div>
    </v-card>
  </div>
</template>
<script>
export default {
  name:'CookieBanner',
  data(){
    return {
      CookiePromptDisplay:true,
      cookieObj:'',
      acceptCookies:''
    }
  },
  methods: {
    toggleCookiePrompt(){
      if(this.CookiePromptDisplay == true){
        this.cookieObj.create('acceptedCookies','true',10)
        this.checkCookie()
      }
    },

    checkCookie(){
      this.acceptCookies = this.cookieObj.read('acceptedCookies')
      if(!this.acceptCookies){
        this.CookiePromptDisplay = true;
      } else {
        this.CookiePromptDisplay = false;
      }
    }
  },
  beforeMount() {
    this.cookieObj = new this.$cookie;
    this.checkCookie()
  }
}
</script>
<style scoped lang="scss">
  #cookieBanner {
    margin:0;
    padding:0 ;
    position:fixed;
    top:86vh;
    left:0;
    width:100%;
    z-index: 1000;
  }
</style>