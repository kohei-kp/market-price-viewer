import Vue from 'vue';
import Vuetify from 'vuetify';

import AppComponent from './app/index.vue';

Vue.use(Vuetify);

const vm = new Vue({
  el: '#app',
  components: {
    app: AppComponent
  },
  render: h => h('app'),
});
