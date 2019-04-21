//adblock detection
//it seems that antiadblock kiler set canRunAds=true so I changed to different variable. nice try. :D
document.getElementById('adblockerwarning').style.display = 'block';
if (aes7EU2p7XzhcQ6B) {
    document.getElementById('adblockerwarning').style.display = 'none';
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



Vue.component('PhotoShow', require('./components/PhotoComponent.vue').default);
Vue.component('FollowButton', require('./components/FollowButtonComponent.vue').default);
Vue.component('SearchBox', require('./components/SearchBoxComponent.vue').default);

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
