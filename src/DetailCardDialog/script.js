import Vue from 'vue'
import bus from '../bus'

export default {
  name: 'DetailCardDialog',

  created () {
    bus.$on('open-detail-card-dialog', this.openDialog)
  },
  updated () {
    bus.$on('open-detail-card-dialog', this.openDialog)
  },
  destroyed () {
    bus.$on('open-detail-card-dialog', this.openDialog)
  },

  props: {
    currentDate: String,
    selectedCardData: {
      types: Object,
      default () {
        return {
          card_id: '',
          site_id: '',
          group_id: '',
          card_name: '',
          url: '',
          update_date: '',
          insert_date: '',
          img_url: ''
        }
      }
    }
  },

  methods: {
    openDialog () {
      Vue.set(this, 'dialogDetailCardVisible', true)
    },

    closeDialog () {
      Vue.set(this, 'dialogDetailCardVisible', false)
    },

    openOriginalPage (url) {
      window.open(url, '_blank')
    },

    updateImage (cardId, siteId, pageUrl) {
      this.fullscreenLoading = true

      const url = `${location.protocol}//${location.host}/index.php/api/v1/screenshot/update`

      const formData = new FormData()
      formData.append('cardId', cardId)
      formData.append('siteId', siteId)
      formData.append('url', pageUrl)

      fetch(url, {
        method: 'POST',
        body: formData
      })
        .then(r => r.json())
        .then(data => {
          bus.$emit('update-currentdate')
          bus.$emit('draw-cardlist')
          this.fullscreenLoading = false
          this.$forceUpdate()
        })
    }
  },

  data () {
    return {
      dialogDetailCardVisible: false,
      fullscreenLoading: false
    }
  }
}
