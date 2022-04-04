<template>
    <div class="contacts-list">
        <div class="contacts-search">
            <input class="contacts-search-input" type="text" placeholder="Поиск контактов, сообщений">
        </div>
        <ul>
            <li class="user-list" v-for="contact in sortedContacts" :key="contact.id"
                @click="selectContact(contact)"
                :class="{ 'selected' : contact === selected }">
                <div class="avatar">
                    <img class="avatar-image" :src="avatarImage(contact)" :alt="contact.login">
                </div>
                <div class="contact">
                    <p class="name">{{ contact.last_name }} {{ contact.first_name }} </p>
                    <p class="email">{{ (onlineFriends.find(onlineFriend => onlineFriend.id === friend.id)) ? 'Онлайн' : 'Оффлайн' }}</p>
                </div>
                <div class="contact-info">
                    <span class="time">12:24</span>
                    <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "ContactsList",
    props:
        ['contacts']
    ,
    data() {
        return {
            selected: this.contacts.length ? this.contacts[0] : null,
            maleAvatar: '/images/user-images/avatar-male.svg',
            femaleAvatar: '/images/user-images/avatar-female.svg',
        }
    },
    methods: {
        avatarImage(contact) {
            return (contact.avatar) ? contact.avatar : (contact.gender) ? this.maleAvatar : this.femaleAvatar;
        },
        selectContact(contact) {
            this.selected = contact;
            this.$emit('selected', contact)
        }
    },
    computed: {
        sortedContacts() {
            return _.sortBy(this.contacts, [(contact) => {
                if (contact == this.selected) {
                    return Infinity;
                }
                return contact.unread;
            }]).reverse()
        }
    }
}
</script>

<style scoped lang="css">
.contacts-list {
    height: 100%;
    width: 35%;
    background: #F6F7F9;
    border: 1px solid #E5E6E9;
    box-sizing: border-box;
    border-radius: 6px;
}

.contacts-search {
    padding: 16px;
    border-bottom: 1px solid #E5E6E9;;
}

.contacts-search-input {
    width: 100%;
    height: 36px;
    padding: 0 10px;

    display: flex;
    align-items: flex-start;

    border: none;
    outline: none;
    background: #FFFFFF;
    border-radius: 2px;

    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 155%;
    color: #333333;
}

.contacts-search-input::placeholder {
    color: #A5A7B0;
}

.contacts-list ul {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 3px;
}


.user-list {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    padding: 20px;

    background: #FFFFFF;
    border-radius: 0px;
}

.avatar-image {
    width: 46px;
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
    font-size: 14px;
    line-height: 155%;

    color: #A5A7B0;
}

.contact-info {
    display: flex;
    margin-left: auto;
    flex-direction: column;
    gap: 4px;
    justify-content: flex-end;
    align-items: flex-end;
}

.time {
    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 129.4%;
    color: #A5A7B0;
}

.unread {
    width: 24px;
    height: 24px;
    background: #1DC0BD;
    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 129.4%;
    color: #FFFFFF;

    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 100%;
}
</style>
