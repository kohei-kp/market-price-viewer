import Vue from 'vue';

export default {
  name: 'App',

  created() {
    console.log('created');
    this.fetchGroupData();
  },

  methods: {
    fetchGroupData() {
      const url = `http://market-price-viewer.local/index.php/api/v1/group/search`;

      fetch(url)
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;

        Vue.set(this, 'group_list', data.group_list);
      });
    },

     handleOpen(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    }

  },

  data: () => {
    return {
      currentDate: new Date(),
      cards: [
        {
          cardName: 'Card Name1',
          src: '/assets/screenshot/2.jpg'
        },
        {
          cardName: 'Card Name2',
          src: '/assets/screenshot/3.jpg'
        },
        {
          cardName: 'Card Name3',
          src: '/assets/screenshot/4.jpg'
        },
        {
          cardName: 'Card Name4',
          src: '/assets/screenshot/5.jpg'
        }
      ],
      group_list: []
    }
  },
};
