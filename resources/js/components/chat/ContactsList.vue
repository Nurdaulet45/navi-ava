<template>
    <div class="contacts-list">
        <div class="contacts-search">
            <input v-model="text" class="contacts-search-input" type="text" placeholder="Поиск контактов, сообщений">
        </div>
        <ul>
            <li class="user-list" v-for="contact in sortedContacts" :key="contact.id"
                @click="selectContact(contact)"
                :class="{ 'selected' : contact === selected }">
                <div class="avatar">
                    <img class="avatar-image" :src="avatarImage(contact.user)" :alt="contact.login">
                </div>
                <div class="contact">
                    <p class="name">{{ userName(contact.user) }} </p>
                    <p class="email">{{ contactMessage(contact) }}</p>
                </div>
                <div class="contact-info">
                    <span class="time">{{ messageTime(contact) }}</span>
                    <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import moment from 'moment'
import 'moment-timezone';

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
            text: null,
            loader: false
        }
    },
    methods: {
        userName(data) {
            return data.last_name + ' ' + data.first_name;
        },
        avatarImage(contact) {
            return (contact.avatar) ? contact.avatar : (contact.gender) ? this.maleAvatar : this.femaleAvatar;
        },
        selectContact(contact) {
            this.selected = contact;
            this.$emit('selected', contact)
        },
        changeFilter(event) {
            this.text = event.target.value
        },
        messageTime(contact) {
            let momentData = moment(contact.updated_at);
            return momentData.format('HH') + ':' + momentData.format('mm');
        },
        contactMessage(contact) {
            if (contact.last_message && contact.last_my_message) {
                if (contact.last_message.id > contact.last_my_message.id) {
                    return contact.last_message.message;
                }
                return contact.last_my_message.message;
            }
            return (contact.last_message.message || contact.last_my_message.message);
        },
    },
    computed: {
        sortedContacts() {
            let sorted = _.sortBy(this.contacts, [(contact) => {
                if (contact === this.selected) {
                    return Infinity;
                }
                return contact.unread;
            }]).reverse()

            if (this.text) {
                sorted = sorted.filter((s) => {
                    if (s.user.last_name.search(this.text) !== -1) {
                        return s;
                    } else if (s.user.first_name.search(this.text) !== -1) {
                        return s;
                    }
                });
            }
            return sorted;
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
    height: 91%;
    overflow: auto;
}

.contacts-list ul::-webkit-scrollbar {
    cursor: pointer;
    width: 5px
}

.contacts-list ul::-webkit-scrollbar-track {
    border-radius: 50%;
    box-shadow: inset 0 0 5px #d6fffe;
    cursor: pointer
}

.contacts-list ul::-webkit-scrollbar-button {
    height: 1px
}

.contacts-list ul::-webkit-scrollbar-thumb {
    background: #1dc0bd;
    border-radius: 5px;
    cursor: pointer
}

.contacts-list ul::-webkit-scrollbar-thumb:hover {
    background: #1dc0bd;
    cursor: pointer
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
