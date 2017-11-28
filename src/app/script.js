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
      ],
      expansions: [
        {
          name: 'イクサラン',
        },
        {
          name: '破滅の刻',
        },
        {
          name: 'アモンケット',
        },
        {
          name: '霊気紛争',
        },
        {
          name: 'カラデシュ',
        },
        {
          name: '異界月',
        },
        {
          name: 'イニストラードを覆う影',
        },
        {
          name: 'ゲートウォッチの誓い',
        },
        {
          name: '戦乱のゼンディカー',
        },
        {
          name: 'タルキール龍紀伝',
        },
        {
          name: '運命再編',
        },
        {
          name: 'タルキール覇王譚',
        },
        {
          name: 'ニクスへの旅',
        }
      ],
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
