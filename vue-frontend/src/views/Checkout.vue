<template>
  <div id="Checkout">
    <v-container fill-height fluid>
      <v-row align="center" justify="center">
        <v-col>
          <h3>Checkout</h3>
        </v-col>
      </v-row>
        <v-row align="center" justify="center">
        <v-col cols="4">
          <h3>Address</h3>
          <v-card>
            <v-col>
              <v-form
                ref="form1"
                v-model="valid"
                lazy-validation
              >
                <v-text-field label="Name" outlined dense v-model="name" :rules="nameRules"></v-text-field>
                <v-text-field label="Address" outlined dense v-model="address" :rules="addressRules"></v-text-field>
                <v-text-field label="Email" outlined dense v-model="email" :rules="emailRules"></v-text-field>
                <v-text-field label="Phone Number" type="number" outlined dense v-model="phoneNumber" :rules="phoneNumberRules"></v-text-field>
              </v-form>
            </v-col>
          </v-card>
        </v-col >
        <v-col cols="4">
          <h3>Payment</h3>
          <v-card>
            <v-col>
              <v-form
                ref="form2"
                v-model="valid"
                lazy-validation
              >
                <v-text-field label="Card Number" type="number" outlined dense v-model="cardNumber" :rules="cardNumberRules"></v-text-field>
                <v-text-field label="CVC-code" type="number" outlined dense v-model="cvc" :rules="cvcRules"></v-text-field>
              </v-form>
            </v-col>
          </v-card>
        </v-col>

        <v-col cols="6"
        >
          <h3>Order</h3>
          <v-card>

            <div class="d-flex justify-space-around pb-3 pt-8">
              <h3>Total:</h3>
              <h3>{{this.total}} $</h3>
            </div>
            
            <v-btn
            class="green white--text mb-7"
            width="60%"
            @click="validation()"
            >
              Order now
            </v-btn>

            <v-card>
              <div 
              v-for="(item, index) in cart" :key="index"
              class="pb-2 pt-2 text-left cartItems"
              >
                <div class="d-flex justify-space-between pl-7 pr-7">
                  <span>{{item.title}} </span>
                  <span>{{item.price}} 	$</span>
                </div>
                <p v-if="item.extras" class="pl-10 extras">+ {{item.extras}}</p>
              </div>
            </v-card>

          </v-card>
        </v-col>
        </v-row>
    </v-container>
  </div>
</template>
<script>
import axios from 'axios'
import { mapGetters } from 'vuex';
export default {
  name:'Checkout',
  data(){
    return {
      cart:[],
      name:'',
      address:'',
      email:'',
      phoneNumber:null,
      cardNumber:null,
      cvc:null,
      total:'0',
      valid:false,
      nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 35) || 'Name must be less than 35 characters'
      ],
      addressRules: [
        v => !!v || 'Address is required'
      ],
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid'
      ],
      phoneNumberRules:[
        v => !!v || 'Phone number is required'
      ],
      cardNumberRules:[
        v => !!v || 'Card number is required'
      ],
      cvcRules:[
        v => !!v || 'CVC number is required',
      ]
    }
  },
  computed: {
    ...mapGetters([
      'getItems',
    ]),
  },
  methods:{  
    calcTotal(){
      this.total = this.getItems.reduce((current, next) =>
        parseFloat(current) + parseFloat(next.price), 0).toFixed(2)
    },

    validation(){
      var a = this.$refs.form1.validate()
      var b = this.$refs.form2.validate()

      if(a == true && b == true){
        this.submit()
        this.$router.push('../confirm')
      }
    },

    submit(){
      var today = new Date();
      var currentDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      var currentTime = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(); 

      axios.post('http://localhost:8087/api/orders',{
        orderInfo: {
          name: this.name,
          address: this.address,
          email: this.email,
          phone: this.phoneNumber,
          total: this.total,
          date: currentDate,
          time: currentTime
        },
        cartInfo: {
          cart: this.cart
        }
      }, {
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      })
      .then(() =>{
        this.$store.state.cart = [];
      })
    }
  },
  beforeMount(){
    this.cart = this.$store.state.cart
  },
  mounted(){
    if(this.cart.length == 0){
      this.$router.push('/order')
    }

    this.calcTotal()
  }
}
</script>
<style lang="scss" scoped>
.cartItems {
  color: #3f3e3e;
  border-top:1px solid rgb(117, 107, 107);
  .extras {
    color: #797878;
  }
}
</style>