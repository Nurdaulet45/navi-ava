<template>
    <div class="chat-app">
        <ContactsList :contacts="contacts" @selected="startConversationWith"/>

        <Conversation :user="user" :information="information" :contact="selectedContact"
                      :messages="messages" :onlineContacts="onlineContacts" :loader="loader"
                      @new="saveNewMessage"/>
    </div>
</template>

<script>
import ContactsList from "./ContactsList";
import Conversation from "./Conversation";

export default {
    name: "ChatApp",
    components: {ContactsList, Conversation},
    props: {
        user: {
            type: Object,
            required: true
        },
        information: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            selectedContact: null,
            activeFriend: '',
            onlineContacts: [],
            messages: [],
            message: '',
            contacts: [],
            loader: false,
            // mal: null
        }
    },
    computed: {
        channelPresence() {
            return window.Echo.join('presence-users');
        },
        channelPrivate() {
            return window.Echo.private(`messages.${this.information.id}`);
        },
    },
    updated() {
        this.getContacts();
    },
    mounted() {
        this.getContacts();

        this.channelPrivate
            .listen('NewMessage', (event) => {
                this.handleIncoming(event.message);
            })

        this.channelPresence
            .here(users => {
                // Онлайн пользователь
                console.log('online users: ', users)
                this.onlineContacts = users;
            })
            .joining(user => {
                // Подключился пользователь
                console.log('joining user: ', user)
                this.onlineContacts.push(user)
            })
            .leaving(user => {
                // Отключился пользователь
                console.log('leaving user: ', user)
                this.onlineContacts.splice(this.onlineContacts.indexOf(user), 1)
            })
    },
    methods: {
        getContacts() {
            axios.get('/cabinet/chats/contacts')
                .then((response) => {
                    this.contacts = response.data;
                }).catch((error) => {
                console.log(error);
            })
        },
        startConversationWith(contact) {
            this.loader = true;
            this.updateUnreadCount(contact, true)

            // axios.get('/cabinet/chats/contact/' + contact)
            //     .then((response) => {
            //         this.mal = response.data;
            //     }).catch((error) => {
            //     console.log(error);
            // })
            //
            // axios.get(`/cabinet/chats/conversation/${contact}`)
            //     .then((response) => {
            //         this.messages = response.data;
            //         this.selectedContact = this.mal;
            //         this.loader = false;
            //     }).catch((error) => {
            //     console.log(error);
            //     this.loader = false;
            // })

            axios.get(`/cabinet/chats/conversation/${contact.id}`)
                .then((response) => {
                    this.messages = response.data;
                    this.selectedContact = contact;
                    this.loader = false;
                })
                .catch((error) => {
                    console.log(error);
                    this.loader = false;
                })
        },
        saveNewMessage(message) {
            this.messages.push(message);
        },
        handleIncoming(message) {
            if (this.selectedContact && message.from === this.selectedContact.id) {
                this.saveNewMessage(message)
                return;
            }
            this.updateUnreadCount(message.from_contact, false)
        },
        updateUnreadCount(contact, reset) {
            this.contacts = this.contacts.map((single) => {
                if (single.id !== contact.id) {
                    return single
                }
                (reset) ? single.unread = 0 : single.unread += 1;

                return single;
            })
        },
    }
}
</script>

<style scoped>
.chat-app {
    width: 100%;
    height: 800px;
    display: flex;
    gap: 15px;
    justify-content: flex-start;
}
</style>
