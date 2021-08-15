import Vue from "vue"
import Vuex from "vuex"

Vue.use(Vuex)
export default new Vuex.Store({
  state: {
    cart: [],
    cartClass: 'checkout-container-open',
    animationPlayed:false
  }, 
  getters: {
    cartUpdate(items){
      this.state.cart = items;
    },
    getItems: state => state.cart,
  },

  mutations: {
    REMOVE_PRODUCT: (state, index) => {
      state.cart.splice(index, 1);
    }, 
  },

  actions: {
    removeProduct: (context, index) => {
      context.commit('REMOVE_PRODUCT', index);
    },
  }
})