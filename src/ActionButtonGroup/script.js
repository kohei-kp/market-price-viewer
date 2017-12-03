import Vue from 'vue';
import bus from '../bus';

export default {

  name: 'ActionButtonGroup',

  created() {
    bus.$on('add-group', this.addGroup);
    bus.$on('add-card', this.addCard);
    this.fetchGroupData();
    this.fetchSiteData();
  },

  methods: {

    handleClickManagementButton(e) {
      location.href = '/index.php/top';
    },

    handleClickAddGroupButton(e) {
      if (this.formGroup.groupname && this.formGroup.groupname !== '') {
        bus.$emit('add-group', this.formGroup.groupname);
      }
    },

    addGroup(groupname) {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/group/create`;

      const formData = new FormData();
      formData.append('groupname', groupname);

      fetch(url, {
        method: 'POST',
        body: formData
      })
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;
        this.dialogAddGroupVisible = false;
        bus.$emit('draw-group');
        bus.$emit('draw-cardlist');
      });
    },

    handleClickAddCardButton(e) {
      bus.$emit('add-card', this.formCard);
    },

    addCard(formCard = {}) {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/card/create`;

      const formData = new FormData();
      Object.keys(formCard).forEach(key => {
        formData.append(key, formCard[key]);
      });

      fetch(url, {
        method: 'POST',
        body: formData
      })
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;
        this.dialogAddCardVisible = false;
        bus.$emit('draw-cardlist');
      });
    },

    fetchGroupData() {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/group/search`;

      fetch(url)
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;
        Vue.set(this, 'groupList', data.group_list);
      });
    },

    fetchSiteData() {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/site/search`;

      fetch(url)
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;
        Vue.set(this, 'siteList', data.site_list);
      });
    }
  },

  data() {
    return {
      dialogAddGroupVisible: false,
      dialogAddCardVisible:  false,
      dialogAddSiteVisible:  false,

      groupList: [],
      siteList: [],

      formGroup: {
        groupname: ''
      },

      formCard: {
        groupId:  '',
        cardname: '',
        url:      '',
        siteId:   ''
      },

      formSite: {
        sitename: '',
        sitecode: ''
      }
    }
  }

};
