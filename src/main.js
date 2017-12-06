import Vue from 'vue';
import VueRouter from 'vue-router';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import 'vue-awesome/icons';
import Icon from 'vue-awesome/components/Icon.vue';

import AppComponent from './App/index.vue';
import ViewerComponent from './Viewer/index.vue';
import ManagementComponent from './Management/index.vue';

Vue.use(VueRouter);
Vue.use(ElementUI);
Vue.component('icon', Icon);

const router = new VueRouter({
  history: true,
  saveScrollPosition: true,
  routes: [
    {
      path: '/',
      component: ViewerComponent
    },
    {
      path: '/management',
      component: ManagementComponent
    }
  ]
});

const vm = new Vue({
  el: '#app',
  components: {
    app: AppComponent
  },
  router,
  render: h => h('app')
});
