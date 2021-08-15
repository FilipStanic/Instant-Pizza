import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify';
import AgCookie from './cookie'
import store from './store'



Vue.config.productionTip = false
Vue.prototype.$cookie = AgCookie


new Vue({
  router,
  vuetify,
  store,
  render: h => h(App)
}).$mount('#app')
