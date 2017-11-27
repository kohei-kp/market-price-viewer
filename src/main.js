import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import 'vue-awesome/icons';
import Icon from 'vue-awesome/components/Icon.vue';
import AppComponent from './app/index.vue';

Vue.use(ElementUI);
Vue.component('icon', Icon);

const vm = new Vue({
  el: '#app',
  components: {
    app: AppComponent,
  },
  render: h => h('app'),
});
