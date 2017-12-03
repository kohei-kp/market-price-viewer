import Vue from 'vue';
import bus from '../bus';
import AddGroupDialog from '../AddGroupDialog/index.vue';
import AddCardDialog from '../AddCardDialog/index.vue';

export default {

  name: 'ActionButtonGroup',

  components: {
    'add-group-dialog': AddGroupDialog,
    'add-card-dialog':  AddCardDialog,
  },

  methods: {

    openAddGroupDialog(e) {
      bus.$emit('change-add-group-visible', true);
    },

    openAddCardDialog(e) {
      bus.$emit('change-add-card-visible', true);
    },

    openManagementPage(e) {
      location.href = '/index.php/top';
    },

  },

  data() {
    return {
    };
  }

};
