import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Faq from '../views/Faq.vue'
import Menu from '../views/Menu.vue'
import Error404 from '../views/Error404.vue'
import Checkout from '../views/Checkout.vue'
import Confirm from '../views/Confirm.vue'
import ShoppingCart from '../views/ShoppingCart.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path:'/faq',
    name: 'Faq',
    component: Faq
  },
  {
    path:'/order',
    name: 'Menu',
    component: Menu
  },
  {
    path:'/order/checkout',
    name:'Checkout',
    component: Checkout
  },
  {
    path:'/confirm',
    name: 'Confirm',
    component: Confirm
  },
  {
    path:'/shopping-cart',
    name: 'ShoppingCart',
    component: ShoppingCart
  },
  {
    path:'*',
    name: 'Error404',
    component: Error404
  }
]

const router = new VueRouter({
  routes
})

export default router
