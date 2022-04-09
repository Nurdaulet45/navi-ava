<!DOCTYPE html>
<head>
    <title>Pusher Test</title>
</head>
<body>
<h1>Pusher Test</h1>
<p>
    Publish an event to channel <code>my-channel</code>
    with event name <code>my-event</code>; it will appear below:
</p>
<div id="app">
    <ul>
        <li v-for="message in messages">
            {{ message }}
        </li>
    </ul>
</div>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('a0b7df058b68f5e72541', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('chat-event', function(data) {
        app.messages.push(JSON.stringify(data));
    });

    // Vue application
    const app = new Vue({
        el: '#app',
        data: {
            message: 'Hello World',
            messages: [],
        },
    });
</script>
</body>
