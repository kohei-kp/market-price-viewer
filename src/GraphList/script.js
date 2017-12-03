import Vue from 'vue';
import bus from '../bus';

export default {
  
  name: 'GraphList',

  created() {
    bus.$on('draw-cardlist', this.drawCardList);
    this.fetchCardData();

    const dt = new Date();
    Vue.set(this, 'currentDate', `${dt.getFullYear()}${dt.getMonth() + 1}${dt.getDate()}${dt.getHours()}${dt.getMinutes()}${dt.getMilliseconds()}`);
  },

  methods: {
    drawCardList(group_id = null) {
      if (group_id) {
        this.fetchCardData({ group_id: group_id });
      } else {
        this.fetchCardData();
      }
    },

    fetchCardData(options = {}) {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/card/search`;

      const formData = new FormData();
      Object.keys(options).forEach(key => {
        formData.append(key, options[key]);
      });

      fetch(url, {
        method: 'POST',
        body: formData
      })
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;

        Vue.set(this, 'card_list', data.card_list);
      });
    }
  },

  data() {
    return {
      card_list: [],
      currentDate: ''
    }
  }

};
