<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-dialog" role="document">
                    <div class="modal-content inner-modal">
                        <div class="modal-header">
                            <button type="button" class="close" @click="$emit('close')" data-dismiss="modal" aria-label="Close">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.93933 7.93933C8.52513 7.35356 9.47487 7.35356 10.0607 7.93933L18 15.8787L25.9393 7.93933C26.5251 7.35356 27.4749 7.35356 28.0606 7.93933C28.6464 8.52513 28.6464 9.47487 28.0606 10.0607L20.1213 18L28.0606 25.9393C28.6464 26.5251 28.6464 27.4749 28.0606 28.0606C27.4749 28.6464 26.5251 28.6464 25.9393 28.0606L18 20.1213L10.0607 28.0606C9.47487 28.6464 8.52513 28.6464 7.93933 28.0606C7.35356 27.4749 7.35356 26.5251 7.93933 25.9393L15.8787 18L7.93933 10.0607C7.35356 9.47487 7.35356 8.52513 7.93933 7.93933Z" fill="#65676E"></path>
                                </svg>
                            </button>
                            <h2 class="welcome-text">
                                Контакты наставника
                            </h2>
                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "Modal"
}
</script>

<style scoped type="text/css">
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}
.modal-content.inner-modal{
    position: relative;
}

.modal-content.inner-modal .close {
    position: absolute;
    top: 20px;
    right: 20px;
}
.modal-header .welcome-text {
    font-family: 'Helvetica-400';
    font-style: normal;
    font-weight: 400;
    font-size: 17px;
    line-height: 165%;
    text-align: center;
    letter-spacing: 0.035em;
    text-transform: uppercase;

    color: #333333;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-content.inner-modal {
    max-width: 300px;
    width: 470px;
    min-width: 580px;

    background: #FFFFFF;
    border-radius: 6px;
    padding: 70px;
}
</style>
