<template>
  <div class="checkout-box">
    <ul class="checkout-list">
      <transition-group name="fade">
      <li v-for="(product, index) in getItems" :key="index + 0" class="checkout-product">
        <h3 class="product-name">{{ product.title }}</h3>
        <span class="product-price">${{ product.price }} </span>
        <v-spacer></v-spacer>
        <button class="product-remove" @click="remove(index)">X</button>
      </li>
      </transition-group>
    </ul>
    <div v-if="!hasProduct()" class="checkout-message">
      <h3>No products...</h3>
      <router-link to="./order">Back to list of products</router-link>
    </div>
    <h3 class="total" v-if="hasProduct()">
      Total: $ {{ totalPrice() }}
    </h3>
    <v-btn
          v-if="hasProduct()"
          class="brown lighten-1 white--text mb-5 mt-5 btn-checkout"
          @click="checkout"
        >Checkout
    </v-btn>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
  name: 'shoppingcart',
  computed: {
    ...mapGetters([
      'getItems',
    ]),
  },
  methods: {
    ...mapActions([
      'removeProduct',
    ]),
    hasProduct() {
      return this.getItems.length > 0;
    },
    totalPrice() {
      return this.getItems.reduce((current, next) =>
        parseFloat(current) + parseFloat(next.price), 0).toFixed(2);
    },
    remove(index) {
      this.removeProduct(index);
    },
    checkout(){
      if(this.getItems != 0){
        this.$router.push('order/checkout')
      }
    }
  },
};
</script>

<style scoped>
  .checkout-box {
    width: 50%;
    max-width: 900px;
    display: flex;
    flex-direction: column;
    margin: 5px auto;
    box-sizing: border-box;
    padding: 1em;
  }
  .checkout-list {
    padding: 0;
  }
  .btn-checkout {
    width: 50%;
    align-self: center;
  }
  .checkout-product {
    display: grid;
    grid-template-columns: 1fr 2fr 2fr .5fr;
    background-color: #fff;
    box-shadow: 10px 10px 10px rgba(4, 11, 37, 0.1);
    border-radius: 5px;
    list-style: none;
    box-sizing: border-box;
    padding: .8em;
    margin: 1em 0;
  }
  .checkout-product * {
    place-self: center;
  }
  .product-name {
    box-sizing: border-box;
  }
  .product-price {
    font-size: 1.2em;
    font-weight: bold;
  }
  .product-remove {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    border: 0;
    background-color: #E0E0E0;
    color: #fff;
    cursor: pointer;
  }
  .total {
    font-size: 2em;
    font-weight: bold;
    align-self: center;
  }
  .checkout-message {
    font-size: 1.5em;
  }
  .fade-enter-active, .fade-leave-active {
    transition: all .5s;
  }
  .fade-enter, .fade-leave-to {
    transform: translateX(-40px);
    opacity: 0;
  }
</style>