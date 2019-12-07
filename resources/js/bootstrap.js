
window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
    console.log(e);
}

jQuery(function () {
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('div.alert').not('.alert-important').delay(3000).fadeOut(350);
})

// Add the following code if you want the name of the file appear on select
jQuery(".custom-file-input").on("change", function() {
    var fileName = jQuery(this).val().split("\\").pop();
    jQuery(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Vue
 */
window.Vue = require('vue');

import './vue-translation';

import i18n from './vue-i18n' // //TODO check if local changes are needed
Vue.use(i18n, window.translations)

import VueProgressBar from 'vue-progressbar'
const VueProgressBarOptions = {
    color: '#3490dc',
    failedColor: '#e3342f',
    thickness: '3px',
    transition: {
      speed: '0.2s',
      opacity: '0.6s',
      termination: 300
    },
}
Vue.use(VueProgressBar, VueProgressBarOptions)

/**
* Our Vuejs event handler which we will be using for flash messaging
* @type  {Vue}
*/
window.events = new Vue();

/**
* Our Flash function which will be used to add new flash events to our event handler
*
* @param    String message Our alert message
* @param    String type    The type of alert we want to show
*/
window.flash = function(message, type) {
    window.events.$emit('flash', message, type);
};
    
Vue.component('flash', require('vue-flash').default);

Vue.use(require('vue-moment'));

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

window.CodeMirror = require('codemirror/mode/sql/sql');
window.CodeMirror = require('codemirror');

if (document.getElementById("editor")) {
    const editor = window.CodeMirror.fromTextArea(document.getElementById("editor"), {
        lineNumbers: true,
        mode: "text/x-sql",
        matchBrackets: true,
        extraKeys: {
           "Ctrl-Enter": function(instance) { 
             $("#sqlform").submit();
           },
         }    
    });
}

Vue.mixin({
    data: function() {
      return {
        get readonly() {
          return readonly;
        },
      }
    }
});

