import Vue from 'vue'
import bus from '../bus'

export default {
  name: 'AddGroupDialog',

  created () {
    bus.$on('add-group', this.addGroup)
    bus.$on('change-add-group-visible', this.changeVisible)
  },

  methods: {
    handleClickAddGroupButton (e) {
      if (this.form.groupname && this.form.groupname !== '') {
        bus.$emit('add-group', this.form.groupname)
      }
    },

    addGroup (groupname) {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/group/create`

      const formData = new FormData()
      formData.append('groupname', groupname)

      fetch(url, {
        method: 'POST',
        body: formData
      })
        .then(r => r.json())
        .then(data => {
          if (data.result === false) return

          bus.$emit('change-add-group-visible', false)
          bus.$emit('draw-group')
          bus.$emit('draw-cardlist')
          bus.$emit('fetch-group')
        })
    },

    changeVisible (bool) {
      Vue.set(this, 'dialogAddGroupVisible', bool)
    }
  },

  data () {
    return {
      dialogAddGroupVisible: false,

      form: {
        groupname: ''
      }
    }
  }
}
