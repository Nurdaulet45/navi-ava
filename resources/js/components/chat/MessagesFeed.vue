<template>
    <div class="feed" v-if="contact" v-chat-scroll="{always: false, smooth: true}">
        <div v-for="message in messages"
             :class="`message-list ${message.to === contact.id ? 'sent' : 'received'}`" :key="message.id">
            <div class="avatar">
                <img class="avatar-image" :src="avatarImage(contact)" :alt="contact.login">
            </div>
            <div class="contact">
                <p class="name">{{ contact.last_name }}</p>
                <p class="text">{{ message.message }}</p>
                <div class="time">{{ messageTimeFormat(message.created_at) }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MessagesFeed",
    props: {
        contact: {
            type: Object,
        },
        messages: {
            type: Array,
            required: true
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
        messageTimeFormat(dateTime) {
            return dateTime.substr(11, 5)
        }
    }
}
</script>

<style lang="css" scoped>
.feed {
    padding: 15px;
    flex: 1;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
    overflow-x: hidden;
}

.feed::-webkit-scrollbar {
    cursor: pointer;
    width: 5px
}

.feed::-webkit-scrollbar-track {
    border-radius: 50%;
    box-shadow: inset 0 0 5px #d6fffe;
    cursor: pointer
}

.feed::-webkit-scrollbar-button {
    height: 1px
}

.feed::-webkit-scrollbar-thumb {
    background: #1dc0bd;
    border-radius: 5px;
    cursor: pointer
}

.feed::-webkit-scrollbar-thumb:hover {
    background: #1dc0bd;
    cursor: pointer
}

.message-list {
    width: 54%;
    margin-bottom: 15px;
    display: flex;
    gap: 10px;
}

.message-list.received {
    margin-right: auto;
}

.message-list.sent {
    justify-content: flex-end;
    margin-left: auto;
}

.avatar-image {
    width: 44px;
}

.contact {
    position: relative;
}

.name {
    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 155%;

    color: #A5A7B0;
}

.text {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    background: #F1F4FF;
    padding: 12px 45px 12px 12px;
    border-radius: 50px;

    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 155%;

    color: #333333;
    position: relative;
    word-break: break-word;
}

.message-list.received .text {
    border-radius: 0 20px 20px 20px;
}

.message-list.sent .text {
    background: #567AFF;
    border-radius: 20px 0 20px 20px;
    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 155%;

    color: #FFFFFF;
}

.time {
    position: absolute;
    bottom: 8px;
    right: 8px;

    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 129.4%;

    color: #90949A;
}

.message-list.sent .time {
    color: #FFFFFF;
}
</style>
