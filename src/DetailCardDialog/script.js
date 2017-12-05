import Vue from 'vue';
import bus from '../bus';

export default {

  name: 'DetailCardDialog',

  created() {
    bus.$on('open-detail-card-dialog', this.openDialog);
  },
  updated() {
    bus.$on('open-detail-card-dialog', this.openDialog);
  },
  destroyed() {
    bus.$on('open-detail-card-dialog', this.openDialog);
  },

  props: {
    currentDate: String
  },

  methods: {

    openDialog(card) {
      Vue.set(this, 'card', card);
      Vue.set(this, 'dialogDetailCardVisible', true);
    },

    closeDialog() {
      Vue.set(this, 'dialogDetailCardVisible', false);
    },

    openOriginalPage(url) {
      window.open(url, '_blank');
    },

    updateImage(cardId) {
      // 画像更新処理
    },

  },

  data() {
    return {
      dialogDetailCardVisible: false,
      card: {
        card_id: '',
        site_id: '',
        group_id: '',
        card_name: '',
        url: '',
        update_date: '',
        insert_date: '',
      }
    };
  }

};
