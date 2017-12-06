import Vue from 'vue';
import bus from '../bus';
import ActionButtonGroup from '../ActionButtonGroup/index.vue';
import GraphList from '../GraphList/index.vue';

export default {
  name: 'App',
  
  components: {
    'action-button-group': ActionButtonGroup,
    'graph-list': GraphList
  },

  created() {
    bus.$on('draw-group', this.fetchGroupData);
    this.fetchGroupData();
  },

  methods: {
    fetchGroupData() {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/group/search`;

      fetch(url)
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;

        Vue.set(this, 'group_list', data.group_list);
      });
    },

    handleClickGroup(e) {
      const groupId = e.$vnode.data.attrs.group_id;
      bus.$emit('draw-cardlist', groupId);
    }
  },

  data: () => {
    return {
      group_list: [],
    }
  },
};
