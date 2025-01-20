import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '0bd9446e2e54d7031392',
    cluster: 'ap1',
    encrypted: true
});
