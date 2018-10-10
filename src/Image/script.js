import bus from '../bus';

export default {
  
  name: 'ScreenShot',

  props: {
    card: Object,
    currentDate: String
  },

  methods: {
    openDetailDialog(card) {
      bus.$emit('open-detail-card-dialog', card);
    }

  }

};
