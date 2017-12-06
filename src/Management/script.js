import GroupManagementComponent from '../GroupManagement/index.vue';
import CardManagementComponent from '../CardManagement/index.vue';
import SiteManagementComponent from '../SiteManagement/index.vue';

export default {

  name: 'Management',

  components: {
    'group-management': GroupManagementComponent,
    'card-management':  CardManagementComponent,
    'site-management':  SiteManagementComponent
  },

  data: () => {
    return {
      activeName: 'first'
    };
  }

};
