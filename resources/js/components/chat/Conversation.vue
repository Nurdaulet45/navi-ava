<template>
    <div class="conversation">
        <div class="conversation-header" v-if="contact">
            <div class="conversation-user">
                <div class="avatar">
                    <img class="avatar-image" :src="avatarImage(contact)" :alt="contact.login">
                </div>
                <div class="contact">
                    <p class="name">{{ contact.last_name }} {{ contact.first_name }}</p>
                    <p class="email">{{ contact.email }}</p>
                </div>
            </div>
        </div>

        <div class="conversation-header h-100" v-else>
            <div class="search-chats">
                <img class="search-chats-image" :src="`/images/chat-icons/search-icon.svg`" alt="Search-icon">
                <h3 class="search-chats-title">У вас пока нет диалогов</h3>


                <div class="search-chats-help">
                    Начать диалог нужно обязательно с приветствия , Пример : " Здравствуйте ...., меня зовут .... . Я
                    ознакомился с вашим аватар (профилем) , и подумал, что вы могли бы помочь мне в моих вопросах . Я
                    интересуюсь или у меня есть (такие-то) вопросы... . Можете ли мне помочь - проконсультировать,
                    подсказать или дать советы на (такие-то) вопросы?
                    <span class="search-chats-help-element"></span>
                </div>
            </div>
        </div>

        <MessagesFeed :contact="contact" :messages="messages"/>

        <MessageComposer @send="sendMessage"/>
    </div>
</template>

<script>
import MessagesFeed from './MessagesFeed';
import MessageComposer from './MessageComposer';

export default {
    name: "ContactsList",
    components: {MessagesFeed, MessageComposer},
    props: {
        contact: {
            type: Object,
            default: null
        },
        messages: {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            maleAvatar: '/images/user-images/avatar-male.svg',
            femaleAvatar: '/images/user-images/avatar-female.svg',
        }
    },
    methods: {
        avatarImage(contact) {
            return (contact.avatar) ? contact.avatar : (contact.gender) ? this.maleAvatar : this.femaleAvatar;
        },
        sendMessage(text) {
            if (!this.contact) {
                return;
            }
            axios.post('/cabinet/chats/conversation/send', {
                contactId: this.contact.id,
                text: text
            }).then((response) => {
                this.$emit('new', response.data)
            }).catch((error) => {
                console.log(error)
            })
        },
    }
}
</script>

<style scoped lang="css">
.conversation {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background: #FFFFFF;

    border: 1px solid #E5E6E9;
    box-sizing: border-box;

    box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.05);
}

.conversation-user {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    padding: 15px 20px;

    border-radius: 0;

    background: #F6F7F9;
    border-bottom: 1px solid #E5E6E9;
}

.avatar-image {
    width: 37px;
}

.contact .name {
    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 155%;

    color: #333333;
}

.contact .email {
    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 14px;

    color: #0CBD82;
}

.search-chats {
    width: 100%;
    height: 100%;
    flex: 1;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    gap: 15px;
}
.search-chats-image {
    margin-top: auto;
}
.search-chats-title {
    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 24px;
    line-height: 155%;

    color: #333333;
}

.search-chats-help {
    margin: auto 40px 20px;
    padding: 10px 15px;
    background: #F1F4FF;

    border: 1px solid #E5E6E9;
    box-sizing: border-box;
    border-radius: 6px;

    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 155%;

    color: #65676E;
    position: relative;
}
.search-chats-help-element {
    background: #F1F4FF;
    position: absolute;
    width: 20px;
    height: 20px;
    border-radius: 6px;
    border: 1px solid #E5E6E9;
    box-sizing: border-box;
    transform: rotate(45deg);
    left: 50px;
    bottom: -10px;
    border-left: none;
    border-top: none;
}
</style>
