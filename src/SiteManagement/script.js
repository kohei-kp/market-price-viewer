import Vue from 'vue';

export default {

  name: 'SiteManagement',

  created() {
    this.fetchSiteData();
  },

  methods: {
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

  data: () => {
    return {
      siteList: []
    };
  }

};
