<template>
    <div class="row">
        <div class="col-8">
            <div class="card card-default">
                <div class="card-header">Messages</div>
                <div class="card-body p-0">
                    <ul class="list-unstyled" style="height:300px; overflow-y:scroll"
                        v-chat-scroll="{always: false, smooth: true}">
                        <li class="p-2" v-for="(message, index) in messages" :key="index">
                            <strong>{{ message.user.last_name }} {{ message.user.first_name }}:</strong>
                            {{ message.message }}
                        </li>
                    </ul>
                </div>

                <input
                    @keydown="sendTypingEvent"
                    @keyup.enter="sendMessage"
                    v-model="newMessage"
                    type="text"
                    name="message"
                    placeholder="Enter your message..."
                    class="form-control">
            </div>
            <span class="text-muted" v-if="activeUser">{{ activeUser.last_name }} {{ activeUser.first_name }} is typing...</span>
        </div>

        <div class="col-4">
            <div class="card card-default">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <ul>
                        <li class="py-2" v-for="(user, index) in users" :key="index">
                            {{ user.last_name }} {{ user.first_name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            messages: [],
            newMessage: '',
            users: [],
            activeUser: false,
            typingTimer: false,
        }
    },
    computed: {
        channel() {
            return window.Echo.join('chat');
        }
    },
    mounted() {
        this.fetchMessages();
        this.channel
            .here(user => {
                this.users = user;
            })
            .joining(user => {
                this.users.push(user);
            })
            .leaving(user => {
                this.users = this.users.filter(u => u.id !== user.id);
            })
            .listen('MessageSent', (event) => {
                this.messages.push(event.message);
            })
            .listenForWhisper('typing', user => {
                this.activeUser = user;
                if (this.typingTimer) {
                    clearTimeout(this.typingTimer);
                }
                this.typingTimer = setTimeout(() => {
                    this.activeUser = false;
                }, 3000);
            })
    },
    methods: {
        fetchMessages() {
            axios.get('/cabinet/messages').then(response => {
                this.messages = response.data;
            })
        },
        sendMessage() {
            this.messages.push({
                user: this.user,
                message: this.newMessage
            });
            axios.post('/cabinet/messages', {message: this.newMessage});
            this.newMessage = '';
        },
        sendTypingEvent() {
            this.channel
                .whisper('typing', this.user);
        }
    }
}
</script>
