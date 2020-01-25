//adblock detection
//it seems that antiadblock kiler set canRunAds=true so I changed to different variable. nice try. :D
if (document.getElementById("adblockerwarning")) {
    document.getElementById('adblockerwarning').style.display = 'block';
    if (typeof aes7EU2p7XzhcQ6B !== 'undefined') {
        document.getElementById('adblockerwarning').style.display = 'none';
    }
}

/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */


Vue.component('PaginationLinks', require('./components/PaginationComponent.vue').default);
Vue.component('DateInput', require('./components/DateInputComponent.vue').default);

Vue.component('PhotoShow', require('./components/PhotoComponent.vue').default);
Vue.component('FollowButton', require('./components/FollowButtonComponent.vue').default);
Vue.component('SqlButton', require('./components/SqlButtonComponent.vue').default);
Vue.component('HubButtons', require('./components/HubButtonsComponent.vue').default);
Vue.component('SearchBox', require('./components/SearchBoxComponent.vue').default);
Vue.component('SqlSelectGui', require('./components/SqlSelectComponent.vue').default);


if ($("#component-container")[0]) {
    const app = new Vue({
        el: '#component-container',
        data: {},
    });
}

if ($("#container")[0]) {
    const app = new Vue({
        el: '#container',
        data: data,
    });
}

if ($("#nav")[0]) {
    const nav = new Vue({
        el: '#nav',
        data: {
            query: ''
        },
    });
}

if ($("#landing")[0]) {
    const landing = new Vue({
        el: '#landing',
        data: {
            active: '',
            hubname: ''
        },
        mounted: function() {
            this.active = window.location.hash.substr(1);
        }
    });
}

if ($("#user-show")[0]) {
    const userShow = new Vue({
        el: '#user-show',
        data: {
            pw: '',
            id: id
        },
        methods: {
            getNewPw: function() {
              self = this;
              this.$Progress.start();
              axios
                .get("/api/user/password/" + this.id, {})
                .then(function(response) {
                  self.pw = response.data.password;
                  self.$Progress.finish();
                })
                .catch(function(error) {
                  self.$Progress.fail();
                  flash(
                      Vue.prototype.$t("Sorry, we can't recive a new Password."),
                      "error"
                   );
                }); 
            }
        }
    });
}

if ($("#user-index")[0]) {
    const userShow = new Vue({
        el: '#user-index'
    });
}

if ($("#sql-editor")[0]) {
    const sqlEditor = new Vue({
        el: '#sql-editor',
        data: {
            table: true,
        },
        methods: {
            removeResult: function() {
              this.table=false;
            }
        }
    });
}

if ($("#sql-select")[0]) {
    const sqlSelect = new Vue({
        el: '#sql-select',
        data: {
            message: {
                type: '',
                text: ''
            },
            table: "",
            query: ""
        },
        methods: {
            getResult: function() {
                if (this.query) {
                    var self = this;
                    this.$Progress.start();
                    axios
                    .post('/api/sql', {
                        editor: this.query
                    })
                    .then(function (response) {
                        self.message.type = response.data.type;
                        self.message.text = response.data.message;
                        self.table = response.data.result;
                        self.$Progress.finish();
                    })
                    .catch(function (error) {
                        flash("Sorry, there is no valid answer from your Database.", 'error');
                        self.$Progress.fail();
                    });
                }
            },
            removeResult: function() {
              this.table="";
              this.message.txte="";
              this.message.type="";
            }
        }
    });
}

if ($("#ad-index")[0]) {
    const adIndex = new Vue({
        el: '#ad-index',
        data: data,
        methods: {
            deleteAd: function (index) {
                var self = this;
                this.$Progress.start();
                axios({
                    method: 'delete',
                    url: '/api/ads/' + this.ads[index].id
                })
                .then(function (response) {
                    self.ads.splice(index, 1)
                    self.$Progress.finish();
                })
                .catch(function (error) {
                    flash("Sorry, we can't delete this Ad.", 'error');
                    self.$Progress.fail();
                });
            },
        }
    });
}

if ($("#ad-edit")[0]) {
    const adEdit = new Vue({
        el: '#ad-edit',
        data: data,
    });
}

if ($("#dba-admin")[0]) {
    const dbaAdmin = new Vue({
        el: '#dba-admin',
        data: {
            pw: '****',
            state: '',
            hub: hub
        },
        mounted: function() {
            this.getStatus();
        },
        methods: {
            getStatus: function() {
                self = this;
                this.$Progress.start();
                axios
                  .get('/api/hubs/' + this.hub + '/dba/gettablestatus', {})
                  .then(function(response) {
                    self.state = response.data.state;
                    self.$Progress.finish();
                  })
                  .catch(function(error) {
                    self.$Progress.fail();
                    flash(
                        Vue.prototype.$t("Sorry, we can't recive Status."),
                        "error"
                     );
                  }); 
              },
            resetPw: function() {
                self = this;
                this.$Progress.start();
                axios
                    .get('/api/hubs/' + this.hub + '/dba/resetpw', {})
                    .then(function(response) {
                    self.pw = response.data.pw;
                    self.$Progress.finish();
                    })
                    .catch(function(error) {
                    self.$Progress.fail();
                    flash(
                        Vue.prototype.$t("Sorry, we can't recive a new Password."),
                        "error"
                        );
                    }); 
            }
        }
    });
}

if ($("#hub-index")[0]) {
    const hubIndex = new Vue({
        el: '#hub-index',
        data: {
            hubs: {},
            pagination: {
                'current_page': 1
            },
            search: '',
            session_domain: session_domain,
            deleteLoading: [],
        },
        methods: {
            deleteHub: function(index) {
                self = this;
                this.deleteLoading[index] = true;
          
                axios
                  .delete('/api/hubs/' + this.hubs[index].id, {})
                  .then(function(response) {
                    self.deleteLoading[index] = false;
                    self.hubs.splice(index, 1);
                  })
                  .catch(function(error) {
                    self.deleteLoading[index] = false;
                    flash(
                        "Sorry, there is a problem deleting " + self.hubs[index].name + ".",
                        "error"
                     );
                  }); 
            },
            fetchHubs() {
                self = this;
                this.$Progress.start();

                axios.get('api/hubs?page=' + this.pagination.current_page)
                    .then(function(response) {
                        self.hubs = response.data.data;
                        self.pagination = response.data.meta;
                        self.$Progress.finish();
                    })
                    .catch(function(error) {
                        self.$Progress.fail();
                    });
            },
            searchHubs: _.throttle(function() {
                if (!this.search) {
                    this.fetchHubs()
                }
                else {
                    self = this;
                    this.$Progress.start();
    
                    axios.get('api/hubs/filter/' + this.search + '?page=1')
                        .then(function(response) {
                            self.hubs = response.data.data;
                            self.pagination = response.data.meta;
                            self.$Progress.finish();
                        })
                        .catch(function(error) {
                            self.$Progress.fail();
                        });
                }
                
            }, 500)
        },
        mounted() {
            this.fetchHubs();
        }
    });
}
