<template>
    <div class="chat-app">
        <ContactsList :contacts="contacts" @selected="startConversationWith"/>

        <loader v-show="loader" object="#ffff" color1="#ffffff" color2="#fff" size="4" speed="2" bg="#343a40"
                objectbg="#999793"
                opacity="53" name="dots"></loader>

        <Conversation :user="user" :information="information" :contact="selectedContact"
                      :messages="messages"
                      @new="saveNewMessage"/>
    </div>
</template>

<script>
import ContactsList from "./ContactsList";
import Conversation from "./Conversation";
import {loader} from "vue-ui-preloader";

export default {
    name: "ChatApp",
    components: {ContactsList, Conversation, loader},
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
            messages: [],
            contacts: [],
            loader: false,
            // mal: null
        }
    },
    computed: {
        channel() {
            return window.Echo.private(`messages.${this.information.id}`);
        }
    },
    mounted() {
        this.channel.listen('NewMessage', (event) => {
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
                }).catch((error) => {
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

                if (reset) {
                    single.unread = 0;
                } else {
                    single.unread += 1;
                }

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
