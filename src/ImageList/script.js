import Vue from 'vue';
import bus from '../bus';
import DetailCardDialog from '../DetailCardDialog/index.vue';
import ImageComponent from '../Image/index.vue';

export default {

  name: 'ImageList',

  components: {
    'screen-shot' : ImageComponent,
    'detail-card-dialog': DetailCardDialog
  },

  created() {
    bus.$on('draw-cardlist', this.drawCardList);
    bus.$on('update-currentdate', this.updateCurrentDate);
    this.updateCurrentDate();
    this.fetchCardData();
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
    },

    updateCurrentDate() {
      const dt = new Date();
      Vue.set(this, 'currentDate', `${dt.getFullYear()}${dt.getMonth() + 1}${dt.getDate()}${dt.getHours()}${dt.getMinutes()}${dt.getMilliseconds()}`);
    }
  },

  computed: {

    separateCardList() {
      const cards = [];
      const listLength = this.card_list.length;

      // cardがないとき、またはcolMaxが0のときは全部にする
      if (listLength === 0 || this.colMax === 0) {
        return cards.push(this.card_list);
      } else {
        for (let i = 0; i < Math.ceil(listLength / this.colMax); i++) {
          const minRange = i * this.colMax;
          cards.push(this.card_list.slice(minRange, minRange + this.colMax));
        }
        return cards;
      }
    }
  },

  data() {
    return {
      card_list: [],
      currentDate: '',
      colMax: 3,

      options: [{
        value: 1,
        label: '1 column'
      }, {
        value: 2,
        label: '2 column'
      }, {
        value: 3,
        label: '3 column'
      }, {
        value: 4,
        label: '4 column'
      }, {
        value: 5,
        label: '5 column'
      }],

      cardSpanTable: [
        24,
        11,
        7,
        5,
        4
      ]
    }
  }

};
