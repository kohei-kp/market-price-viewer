import Vue from 'vue';
import bus from '../bus';

export default {

  name: 'DetailCardDialog',

  created() {
    bus.$on(`change-detail-card${this.cardId}-visible`, this.changeVisible);
  },
  updated() {
    bus.$on(`change-detail-card${this.cardId}-visible`, this.changeVisible);
  },
  destroyed() {
    bus.$off(`change-detail-card${this.cardId}-visible`, this.changeVisible);
  },

  props: {
    cardName: String,
    url: String,
    cardId: String,
    currentDate: String
  },

  methods: {

    openOriginalPage(url) {
      window.open(url, '_blank');
    },

    updateImage(cardId) {
      // 画像更新処理
    },

    changeVisible(bool) {
      Vue.set(this, 'dialogDetailCardVisible', bool);
    }

  },

  data() {
    return {
      dialogDetailCardVisible: false
    };
  }

};
