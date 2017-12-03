import Vue from 'vue';
import bus from '../bus';

export default {

  name: 'AddCardDialog',

  created() {
    bus.$on('add-card', this.addCard);
    bus.$on('change-add-card-visible', this.changeVisible);
    this.fetchGroupData();
    this.fetchSiteData();
  },

  methods: {

    handleClickAddCardButton(e) {
      bus.$emit('add-card', this.form);
    },

    addCard(form = {}) {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/card/create`;

      const formData = new FormData();
      Object.keys(form).forEach(key => {
        formData.append(key, form[key]);
      });

      fetch(url, {
        method: 'POST',
        body: formData
      })
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;

        bus.$emit('change-add-card-visible', false);
        bus.$emit('draw-cardlist');
      });
    },

    changeVisible(bool) {
      Vue.set(this, 'dialogAddCardVisible', bool);
    },

    fetchGroupData() {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/group/search`

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
      dialogAddCardVisible: false,

      groupList: [],
      siteList: [],

      form: {
        groupId:  '',
        cardname: '',
        url:      '',
        siteId:   ''
      }
    };
  }
};
