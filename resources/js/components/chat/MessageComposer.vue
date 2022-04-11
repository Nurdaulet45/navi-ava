<template>
    <div class="composer">
        <input class="composer-input" v-model="message" @keydown.enter="send"
               placeholder="Напишите сообщение..."/>
        <button class="composer-btn" @click="send">
            <img :src="composerBtnImage" alt="sendImage">
        </button>
    </div>
</template>

<script>
export default {
    name: "MessageComposer",
    data() {
        return {
            message: '',
            composerBtnImage: '/images/send-icon.svg'
        }
    },
    methods: {
        send(event) {
            event.preventDefault()
            if (this.message.trim() === '') {
                return;
            }
            this.$emit('send', this.message);
            this.message = '';
        },
    }
}
</script>

<style scoped type="text/css">
.composer {
    height: 63px;
    border-top: 1px solid #C3C8CC;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.composer-input {
    width: 100%;
    height: 100%;
    padding: 20px;
    border: none;

    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 155%;

    color: #333333;
    caret-color: #1DC0BD;

    overflow: auto;
}

.composer-input::placeholder {
    color: #A5A7B0;
}

.composer-input::-webkit-scrollbar {
    cursor: pointer;
    width: 5px
}

.composer-input::-webkit-scrollbar-track {
    border-radius: 50%;
    box-shadow: inset 0 0 5px #d6fffe;
    cursor: pointer
}

.composer-input::-webkit-scrollbar-button {
    height: 1px
}

.composer-input::-webkit-scrollbar-thumb {
    background: #1dc0bd;
    border-radius: 5px;
    cursor: pointer
}

.composer-input::-webkit-scrollbar-thumb:hover {
    background: #1dc0bd;
    cursor: pointer
}

.composer-btn {
    border: none;
    outline: none;
    padding: 0 15px;
}
</style>
