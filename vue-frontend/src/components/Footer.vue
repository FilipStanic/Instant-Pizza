<template>
  <v-footer
    dark
    padless
  >
    <v-card
      flat
      tile
      class="brown darken-2 white--text text-center"
    >
      <v-card-text>
        <v-btn
          v-for="(icon, index) in icons"
          :key="index"
          class="mx-4 white--text"
          icon
        >
          <a :href="urls[index]" target="_blank" class="text-decoration-none white--text"><v-icon size="24px">mdi-{{ icon }}</v-icon></a>
        </v-btn>
      </v-card-text>

      <v-card-text class="white--text pt-0">
        Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus commodo interdum. Praesent ut risus eget metus luctus accumsan id ultrices nunc. Sed at orci sed massa consectetur dignissim a sit amet dui. Duis commodo vitae velit et faucibus. Morbi vehicula lacinia malesuada. Nulla placerat augue vel ipsum ultrices, cursus iaculis dui sollicitudin. Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="white--text" id="copyRight">
        <span>&copy; </span>{{ new Date().getFullYear() }} — <strong>Instant Pizza</strong>
      </v-card-text>
    </v-card>
  </v-footer>
</template>
<script>
export default {
  name: 'Footer',
  data(){
    return {
      icons:[
        'facebook',
        'twitter',
        'linkedin',
        'instagram'
      ],
      username:'instant-pizza',
      urls: []
    }
  }
  ,
  beforeMount(){
    for(var i = 0; i < this.icons.length; i++){
      this.urls[i] = 'https://www.'+this.icons[i]+'.com/' + this.username;
    }
  }
}
</script>
<style lang="scss" scoped>
#copyRight {
  height:160px;
}
</style>
