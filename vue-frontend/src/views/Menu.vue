<template>
<div class="order">
  <v-container>


    <Prompt id="prompt" 
      @update-prompt="updatePrompt"
      @adding-to-cart="cartAdd"
      msg="Are you sure you would like to order this?" :displayPrompt='promptDisplay' 
      :title="promptedItem.title"
      :img="imgUrlSetup(promptedItem.img)" 
      :price="promptedItem.price"
      :extras="promptedItem.extras"
    />


    <v-row class="pb-10">
      <v-col>
        <div id="availableFood" class="d-flex flex-wrap justify-center">

          <v-card v-for="(item, index) in items" :key="index"
          class="pt-5 pb-5 mb-15 ml-2 mr-2"
          id="item-card"
          >
            <h3>{{item.title}}</h3>
            <div class="img-container d-flex align-center">
              <img :src="imgUrlSetup(item.img)" alt="">
            </div>
            <span><strong>Price: </strong>{{item.price}} $</span>
            <div class="text-center">
              <v-btn
              class="brown lighten-1 white--text"
              @click="cartPrompt(index)"
              >
              Add to cart
              </v-btn>
            </div>
          </v-card>

        </div>
      </v-col>
    </v-row>
  </v-container>
</div>
</template>
<script>
import Prompt from '../components/Prompt.vue';
import axios from 'axios';

export default {
  name: 'Menu',
  components: {
    Prompt,
  },
  data(){
    return {
      imgPath:'http://localhost:8087/public/item-images/',
      promptDisplay:'true',
      mobileCartDisplay:false,
      promptedItem:{
        title: '',
        price:'' ,
        extras: ''
      },
      items: [],
      cart:[
      ],
      totalPrice:'0',
      cartClass:'checkout-container-closed',
      rotationClass:'rotate180'
    }
  },
  methods: {
    imgUrlSetup(img){
      var fullUrl = this.imgPath + img;
      return (fullUrl)
    },

    cartPrompt(index){
      this.promptedItem = {
        title: this.items[index].title,
        img: this.items[index].img,
        price: this.items[index].price,
        extras: this.items[index].extras
      }
      this.promptDisplay = 'true'
    },

    cartAdd(response){
      this.promptedItem.extras = '';

      if(response.length > 0 && response.length < 2){
        this.promptedItem.extras = response[0]
      } else if (response.length >= 2){
        for(var e = 0; e < response.length; e++){
          if(e != response.length - 1){
            this.promptedItem.extras = this.promptedItem.extras + response[e] + ', '
          } else {
            this.promptedItem.extras = this.promptedItem.extras + response[e]
          }
        }
      } else if (response.length == 0){
        this.promptedItem.extras = '';
      }

      delete this.promptedItem.img; 
      
      this.cart.push(this.promptedItem)
      this.$store.state.cart = this.cart
      
      this.updatePrompt()
      this.promptedItem = {}; 
    },

    updatePrompt(){
      this.promptDisplay = 'false'
    },
  },
  beforeMount(){
    axios.get('http://localhost:8087/api/items')
    .then(response=>{
      this.items = response.data
    })
  },
  mounted(){
    this.cart = this.$store.state.cart
    this.promptDisplay = 'false'
  }
}
</script>
<style scoped lang="scss">
.order {
  background-color: #f1efef;
  #item-card {
    max-width: 240px;
    .img-container {
      width:80%;
      margin:7px auto;
      height:151px;
      overflow: hidden;
      img {
        width:100%;
      }
    }
  }
}

@media (max-width: 575px){
  #item-card {
  max-width: 240px;
  min-width: 90%;
  }
};

</style>
