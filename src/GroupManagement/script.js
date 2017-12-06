import Vue from 'vue';

export default {

  name: 'GroupManagement',

  created() {
    this.fetchGroupData();
  },

  methods: {
    fetchGroupData() {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/group/search`

      fetch(url)
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;

        Vue.set(this, 'groupList', data.group_list);
      });
    }
  },

  data: () => {
    return {
      groupList: []
    };
  }

};
