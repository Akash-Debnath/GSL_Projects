import Vue from 'vue'
import App from './App'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import 'bootstrap'
import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue.esm';
import $ from 'jquery'
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import '@/assets/css/bundle.css'
import '@/assets/css/style.css'
import '@/assets/css/custom.css'
import '@/assets/css/roboto-font.css'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import '@/assets/css/vue-pagination.css'
import '@/assets/fontawesome-5/css/all.css'




Vue.use(BootstrapVue);
Vue.use(Vuetify);
Vue.config.productionTip = false

axios.defaults.baseURL  = 'http://localhost/ificKBS/public/api/';
// axios.defaults.baseURL = 'http://192.168.11.53/kbs/back/public/api/';
// axios.defaults.baseURL = 'https://kbs.gplex.com/back/public/api/';
//axios.defaults.baseURL = 'http://192.168.11.53/kbspro/back/public/api/';

/ eslint-disable no-new /
new Vue({
  el: '#app',
  router,
  axios,
  VueAxios,
  BootstrapVue,
  vuetify : new Vuetify(),
  $,
  components: { App },
  template: '<App/>'
})