import bus from '../bus';

export default {
  
  name: 'ScreenShot',

  props: {
    card: Object,
    currentDate: String
  },

  methods: {
    handleClickImage () {
      this.$emit('selected-card-data', card);
      this.openDetailDialog()
    },

    openDetailDialog() {
      bus.$emit('open-detail-card-dialog');
    }
  }

};
