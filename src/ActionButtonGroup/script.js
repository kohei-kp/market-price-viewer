import bus from '../bus';

export default {

  name: 'ActionButtonGroup',

  created() {
    bus.$on('add-group', this.addGroup);
  },

  methods: {

    handleClickManagementButton(e) {
      location.href = '/index.php/top';
    },

    handleClickAddGroupButton(e) {
      if (this.formGroup.groupname && this.formGroup.groupname !== '') {
        bus.$emit('add-group', this.formGroup.groupname);
      }
    },

    addGroup(groupname) {
      const url = `${location.protocol}//${location.host}/index.php/api/v1/group/create`;

      const formData = new FormData();
      formData.append('groupname', groupname);

      fetch(url, {
        method: 'POST',
        body: formData
      })
      .then(r => r.json())
      .then(data => {
        if (data.result === false) return;
        this.dialogAddGroupVisible = false;
        bus.$emit('draw-group');
        bus.$emit('draw-cardlist');
      });

    }


  },

  data() {
    return {
      dialogAddGroupVisible: false,
      dialogAddCardVisible:  false,
      dialogAddSiteVisible:  false,

      formGroup: {
        groupname: ''
      },

      formCard: {
        cardname: '',
        url:      '',
        siteId:   ''
      },

      formSite: {
        sitename: '',
        sitecode: ''
      }
    }
  }

};
