import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css'
import AppComponent from './app/index.vue';

Vue.use(ElementUI);

const vm = new Vue({
  el: '#app',
  components: {
    app: AppComponent
  },
  render: h => h('app'),
});
