<template>
  <div>
    <v-container >
      <v-row>
        <v-col>
          <h1>Your order is on its way !</h1>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <h3>Check your email for your digital receipt.</h3>
        </v-col>
      </v-row>
      <v-row class="d-flex justify-center">
        <v-btn class="brown lighten-1 white--text"
          @click="redirectHome"
        >
          Back to home
        </v-btn>
      </v-row>
    </v-container>
  </div>
</template>
<script>
export default {
  name: 'Confirm',
  data(){
    return {

    }
  },
  methods:{
    redirectHome(){
      this.$router.push('/')
    }
  }
}
</script>
<style lang="scss" scoped>

</style>