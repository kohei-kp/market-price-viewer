export default {
  name: 'App',
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
      ]
    }
  },
  methods: {
    handleOpen(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    }
  }
};
