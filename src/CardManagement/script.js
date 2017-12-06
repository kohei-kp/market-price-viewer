import Vue from 'vue';

export default {

  name: 'CardManagement',

  created() {
    this.fetchCardData();
  },

  methods: {
    fetchCardData() {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/card/search`;

      fetch(url)
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;

        Vue.set(this, 'cardList', data.card_list);
      });
    }
  },

  data: () => {
    return {
      cardList: []
    };
  }

};
