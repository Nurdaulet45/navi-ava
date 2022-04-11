window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {

}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.Vue = require('vue').default;

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.defaults.baseURL = (process.env.NODE_ENV === 'development') ? process.env.MIX_APP_LOCAL_URL : process.env.MIX_APP_PROD_URL;
window.axios.withCredentials = true;

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo"

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    // wsHost: window.location.hostname,
    // wsPort: 6001,
    forceTLS: true, // true
    // disableStats: true,
});

// wsHost: window.location.hostname,
// wsPort: 6001,
// wssPort: 6001,
// encrypted: false,
// disableStats: true,
// enabledTransports: ['ws', 'wss'],

