<template>
    <div class="chat-app">
        <ContactsList :contacts="contacts" @selected="startConversationWith"/>
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
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
        }
    },
    data() {
        return {
            selectedContact: null,
            activeFriend: '',
            messages: [],
            contacts: [],
        }
    },
    computed: {
        channel() {
            return window.Echo.private(`messages.${this.user.id}`);
        }
    },
    mounted() {
        this.channel.here((users) => {
            console.log('online users', users)
        }).listen('NewMessage', (event) => {
            this.handleIncoming(event.message);
        })

        axios.get('/cabinet/chats/contacts')
            .then((response) => {
                this.contacts = response.data;
            }).catch((error) => {
            console.log(error);
        })
    },
    methods: {
        startConversationWith(contact) {
            this.updateUnreadCount(contact, true)

            axios.get(`/cabinet/chats/conversation/${contact.id}`)
                .then((response) => {
                    this.messages = response.data;
                    this.selectedContact = contact;
                }).catch((error) => {
                console.log(error);
            })
        },
        saveNewMessage(message) {
            this.messages.push(message);
        },
        handleIncoming(message) {
            if (this.selectedContact && message.from == this.selectedContact.id) {
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

                if (reset) {
                    single.unread = 0;
                } else {
                    single.unread += 1;
                }

                return single;
            })
        }

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
