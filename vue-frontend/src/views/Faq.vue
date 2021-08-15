<template>
  <div class="faq">
    <h2 class="pt-6 pb-3">Frequently Asked Questions</h2>
    <v-container>
      <v-card 
      class="brown lighten-5 dark--text pt-5 pb-5 pl-5 pr-5 mb-3 text-left"
      v-for="(faq, index) in faqs" :key="index"
      >
        <h3>{{index + 1}}. {{faq.question}}</h3>
        <p class="pl-4">{{faq.answer}}</p>
      </v-card>
    </v-container>
  </div>
</template>
<script>
import Axios from 'axios'
export default {
  name: 'faq',
  data(){
    return {
      faqs: []
    }
  },
  methods:{

  },
  beforeMount(){
    Axios.get('http://localhost:8087/api/faq')
    .then(response=>{
      this.faqs = response.data
    })
  }
}
</script>
