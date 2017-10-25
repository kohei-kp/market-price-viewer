import Vue from 'vue';

export default {
  name: 'GraphList',
  components: {
    //'graph-data': GraphData,
  },
  methods: {
    handleChangeGroupList(groupName) {
      console.log(groupName);
    }
  },
  data() {
    return {
      cards: [
        {
          cardName: 'Card Name1',
          src: '../assets/screenshot/2.jpg'
        },
        {
          cardName: 'Card Name2',
          src: '../assets/screenshot/3.jpg'
        },
        {
          cardName: 'Card Name3',
          src: '../assets/screenshot/4.jpg'
        },
        {
          cardName: 'Card Name4',
          src: '../assets/screenshot/5.jpg'
        }
      ]
    }
  }
};
