export default {

  name: 'ActionButtonGroup',

  methods: {

    handleClickManagementButton(e) {
      location.href = '/index.php/top';
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
