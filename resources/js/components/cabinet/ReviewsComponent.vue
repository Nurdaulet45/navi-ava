<template>
    <div class="">
        <Loader v-if="loader"/>
        <div class="category-tabs">
            <div class="category-tab-item"
                 @click.prevent="setTab('all_reviews')"
                 :class="{active: tab === 'all_reviews'}">
                Все
            </div>
            <div class="category-tab-item"
                 @click.prevent="setTab('reviewed_reviews')"
                 :class="{active: tab === 'reviewed_reviews'}">
                Мои отзывы
            </div>
            <div class="category-tab-item"
                 @click.prevent="setTab('about_me_reviews')"
                 :class="{active: tab === 'about_me_reviews'}">
                Обо мне
            </div>
        </div>
        <template v-if="tab === 'all_reviews'">
            <div class="review-items" v-if="all_reviews.data.length">
                <template v-for="(all_review, index) in all_reviews.data">
                    <template v-if="all_review.reviewer_id == auth_user.id">
                        <div class="review-item">
                            <div class="head">
                                <div class="info">
                                    <img :src="all_review.reviewer.avatar" width="61" height="61" alt="user-review">
                                    <div class="user">
                                        <div class="name">
                                            {{ all_review.reviewer.full_name }}
                                        </div>
                                        <div class="work" v-if="all_review.reviewer.specialization_text">
                                            {{ all_review.reviewer.specialization_text }}
                                        </div>
                                    </div>
                                </div>
                                <div class="date">
                                    {{ all_review.created_at }}
                                    <div class="stars" v-if="all_review.rate">
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                             xmlns="http://www.w3.org/2000/svg"
                                             v-for="n in getStarActive(all_review.rate)">
                                            <path
                                                d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                fill="#E0C01A"></path>
                                        </svg>
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                             xmlns="http://www.w3.org/2000/svg" v-for="n in
                                    getStarInactive(all_review.rate)">
                                            <path d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855
                                         12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z" fill="#C5C4C3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="medium-small-text dark-charcoal-text">
                                {{
                                    all_review.text
                                }}
                            </div>
                            <div class="comment-reply" v-if="all_review.reply">
                                <div class="comment-reply-image">
                                    <img :src="all_review.reply.reviewer.avatar" width="61" height="61"
                                         alt="user-review">
                                </div>
                                <div class="comment-reply-body w-100">
                                    <div class="name">
                                        {{ all_review.reply.reviewer.full_name }}
                                    </div>
                                    <div class="medium-small-text dark-charcoal-text">

                                        {{ all_review.reply.text }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="review-item">
                            <div class="head">
                                <div class="info">
                                    <img :src="all_review.reviewer.avatar" width="61" height="61" alt="user-review">
                                    <div class="user">
                                        <div class="name">
                                            {{ all_review.reviewer.full_name }}
                                        </div>
                                        <div class="work" v-if="all_review.reviewer.specialization_text">
                                            {{ all_review.reviewer.specialization_text }}
                                        </div>
                                    </div>
                                </div>
                                <div class="date">
                                    {{ all_review.created_at }}
                                    <div class="stars" v-if="all_review.rate">
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                             xmlns="http://www.w3.org/2000/svg"
                                             v-for="n in getStarActive(all_review.rate)">
                                            <path
                                                d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                                fill="#E0C01A"></path>
                                        </svg>
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                             xmlns="http://www.w3.org/2000/svg" v-for="n in
                                    getStarInactive(all_review.rate)">
                                            <path d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855
                                         12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z" fill="#C5C4C3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="medium-small-text dark-charcoal-text">
                                {{
                                    all_review.text
                                }}
                            </div>
                            <div class="comment" @click.prevent="replyReview(all_review.id)"
                                 v-if="!all_review.reply && (reply_review.review_id != all_review.id)">
                                Комментировать
                            </div>
                            <div class="comment-reply"
                                 v-else-if="!all_review.reply && (reply_review.review_id == all_review.id)">
                                <div class="comment-reply-image">
                                    <img :src="auth_user.avatar" width="61" height="61" alt="user-review">
                                </div>
                                <div class="comment-reply-body w-100">
                                    <div class="name">
                                        {{ auth_user.full_name }}
                                    </div>
                                    <div class="comment-enter">
                                        <textarea name="" id="" cols="30" rows="2.8"
                                                  class="form-control textarea-default w-100"
                                                  placeholder="Напишите что-нибудь"
                                                  v-model="reply_review.text"></textarea>
                                        <div class="buttons">
                                            <button class="btn-default small-btn h-45" @click.prevent="saveReplyReview()">
                                                Отправить
                                            </button>
                                            <button class="btn-white-green small-btn h-45"
                                                    @click.prevent="clearReplyReview()">
                                                Отменить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-reply" v-else>
                                <div class="comment-reply-image">
                                    <img :src="all_review.reply.reviewer.avatar" width="61" height="61"
                                         alt="user-review">
                                </div>
                                <div class="comment-reply-body w-100">
                                    <div class="name">
                                        {{ all_review.reply.reviewer.full_name }}
                                    </div>
                                    <div class="medium-small-text dark-charcoal-text">
                                        {{ all_review.reply.text}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <div class="line" v-if="(index+1) != all_reviews.data.length"></div>
                </template>
            </div>
            <div class="review-items justify-content-center" v-else>
                <h3 class="empty-text">Пусто</h3>
            </div>
            <button class="btn-white-green medium-btn w-100 btn-load-more" @click.prevent="getReviews"
                    v-if="all_reviews.meta.last_page != all_reviews.meta.current_page">
                Показать еще
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.7929 2.29289C13.1834 1.90237 13.8166 1.90237 14.2071 2.29289L17.2071 5.29289C17.5976 5.68342 17.5976 6.31658 17.2071 6.70711L14.2071 9.70711C13.8166 10.0976 13.1834 10.0976 12.7929 9.70711C12.4024 9.31658 12.4024 8.68342 12.7929 8.29289L14.0858 7H12.5C8.95228 7 6 9.95228 6 13.5C6 17.0477 8.95228 20 12.5 20C16.0477 20 19 17.0477 19 13.5C19 12.9477 19.4477 12.5 20 12.5C20.5523 12.5 21 12.9477 21 13.5C21 18.1523 17.1523 22 12.5 22C7.84772 22 4 18.1523 4 13.5C4 8.84772 7.84772 5 12.5 5H14.0858L12.7929 3.70711C12.4024 3.31658 12.4024 2.68342 12.7929 2.29289Z"
                        fill="#1DC0BD"></path>
                </svg>
            </button>
        </template>
        <template v-if="tab === 'reviewed_reviews'">
            <div class="review-items" v-if="reviewed_reviews.data.length">
                <template v-for="(reviewed_review, index) in reviewed_reviews.data">
                    <div class="review-item">
                        <div class="head">
                            <div class="info">
                                <img :src="reviewed_review.reviewer.avatar" width="61" height="61" alt="user-review">
                                <div class="user">
                                    <div class="name">
                                        {{ reviewed_review.reviewer.full_name }}
                                    </div>
                                    <div class="work" v-if="reviewed_review.reviewer.specialization_text">
                                        {{ reviewed_review.reviewer.specialization_text }}
                                    </div>
                                </div>
                            </div>
                            <div class="date">
                                {{ reviewed_review.created_at }}
                                <div class="stars" v-if="reviewed_review.rate">
                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg"
                                         v-for="n in getStarActive(reviewed_review.rate)">
                                        <path
                                            d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                            fill="#E0C01A"></path>
                                    </svg>
                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg" v-for="n in
                                        getStarInactive(reviewed_review.rate)">
                                        <path d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855
                                             12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z" fill="#C5C4C3"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="medium-small-text dark-charcoal-text">
                            {{
                                reviewed_review.text
                            }}
                        </div>
                        <div class="review-item my-review" v-if="reviewed_review.reply">
                            <div class="head">
                                <div class="info">
                                    <img :src="reviewed_review.reply.reviewer.avatar" width="61" height="61"
                                         alt="user-review">
                                    <div class="user">
                                        <div class="name">
                                            {{ reviewed_review.reply.reviewer.full_name }}
                                        </div>
                                        <div class="work" v-if="reviewed_review.reply.reviewer.specialization_text">
                                            {{ reviewed_review.reply.reviewer.specialization_text }}
                                        </div>
                                    </div>
                                </div>
                                <div class="date">
                                    {{ reviewed_review.reply.created_at }}
                                </div>
                            </div>
                            <div class="medium-small-text dark-charcoal-text">
                                {{
                                    reviewed_review.reply.text
                                }}
                            </div>
                        </div>
                    </div>
                    <div class="line" v-if="(index+1) != reviewed_reviews.data.length"></div>
                </template>
            </div>
            <div class="review-items justify-content-center" v-else>
                <h3 class="empty-text">Пусто</h3>
            </div>
            <button class="btn-white-green medium-btn w-100 btn-load-more" @click.prevent="getReviewedReviews"
                    v-if="reviewed_reviews.meta.last_page != reviewed_reviews.meta.current_page">
                Показать еще
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.7929 2.29289C13.1834 1.90237 13.8166 1.90237 14.2071 2.29289L17.2071 5.29289C17.5976 5.68342 17.5976 6.31658 17.2071 6.70711L14.2071 9.70711C13.8166 10.0976 13.1834 10.0976 12.7929 9.70711C12.4024 9.31658 12.4024 8.68342 12.7929 8.29289L14.0858 7H12.5C8.95228 7 6 9.95228 6 13.5C6 17.0477 8.95228 20 12.5 20C16.0477 20 19 17.0477 19 13.5C19 12.9477 19.4477 12.5 20 12.5C20.5523 12.5 21 12.9477 21 13.5C21 18.1523 17.1523 22 12.5 22C7.84772 22 4 18.1523 4 13.5C4 8.84772 7.84772 5 12.5 5H14.0858L12.7929 3.70711C12.4024 3.31658 12.4024 2.68342 12.7929 2.29289Z"
                        fill="#1DC0BD"></path>
                </svg>
            </button>
        </template>
        <template v-if="tab === 'about_me_reviews'">
            <div class="review-items" v-if="about_me_reviews.data.length">
                <template v-for="(about_me_review, index) in about_me_reviews.data">
                    <div class="review-item">
                        <div class="head">
                            <div class="info">
                                <img :src="about_me_review.reviewer.avatar" width="61" height="61" alt="user-review">
                                <div class="user">
                                    <div class="name">
                                        {{ about_me_review.reviewer.full_name }}
                                    </div>
                                    <div class="work" v-if="about_me_review.reviewer.specialization_text">
                                        {{ about_me_review.reviewer.specialization_text }}
                                    </div>
                                </div>
                            </div>
                            <div class="date">
                                {{ about_me_review.reviewer.created_at }}
                                <div class="stars" v-if="about_me_review.rate">
                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg"
                                         v-for="n in getStarActive(about_me_review.rate)">
                                        <path
                                            d="M7.5 0L9.18386 4.83688H14.6329L10.2245 7.82624L11.9084 12.6631L7.5 9.67376L3.09161 12.6631L4.77547 7.82624L0.367076 4.83688H5.81614L7.5 0Z"
                                            fill="#E0C01A"></path>
                                    </svg>
                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg" v-for="n in
                                    getStarInactive(about_me_review.rate)">
                                        <path d="M7 0L8.5716 4.83688H13.6574L9.5429 7.82624L11.1145 12.6631L7 9.67376L2.8855
                                         12.6631L4.4571 7.82624L0.342604 4.83688H5.4284L7 0Z" fill="#C5C4C3"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="medium-small-text dark-charcoal-text">
                            {{
                                about_me_review.text
                            }}
                        </div>
                        <div class="comment" @click.prevent="replyReview(about_me_review.id)"
                             v-if="!about_me_review.reply && (reply_review.review_id != about_me_review.id)">
                            Комментировать
                        </div>
                        <div class="comment-reply"
                             v-else-if="!about_me_review.reply && (reply_review.review_id == about_me_review.id)">
                            <div class="comment-reply-image">
                                <img :src="auth_user.avatar" width="61" height="61" alt="user-review">
                            </div>
                            <div class="comment-reply-body w-100">
                                <div class="name">
                                    {{ auth_user.full_name }}
                                </div>
                                <div class="comment-enter">
                                        <textarea name="" id="" cols="30" rows="2.8"
                                                  class="form-control textarea-default w-100"
                                                  placeholder="Напишите что-нибудь"
                                                  v-model="reply_review.text"></textarea>
                                    <div class="buttons">
                                        <button class="btn-default small-btn h-45" @click.prevent="saveReplyReview()">
                                            Отправить
                                        </button>
                                        <button class="btn-white-green small-btn h-45"
                                                @click.prevent="clearReplyReview()">
                                            Отменить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comment-reply" v-else>
                            <div class="comment-reply-image">
                                <img :src="about_me_review.reply.reviewer.avatar" width="61" height="61"
                                     alt="user-review">
                            </div>
                            <div class="comment-reply-body w-100">
                                <div class="name">
                                    {{ about_me_review.reply.reviewer.full_name }}
                                </div>
                                <div class="medium-small-text dark-charcoal-text">
                                    {{
                                        about_me_review.reply.text
                                    }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line" v-if="(index+1) != about_me_reviews.data.length"></div>
                </template>
            </div>
            <div class="review-items justify-content-center" v-else>
                <h3 class="empty-text">Пусто</h3>
            </div>
            <button class="btn-white-green medium-btn w-100 btn-load-more" @click.prevent="getAboutMeReviews"
                    v-if="about_me_reviews.meta.last_page != about_me_reviews.meta.current_page">
                Показать еще
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.7929 2.29289C13.1834 1.90237 13.8166 1.90237 14.2071 2.29289L17.2071 5.29289C17.5976 5.68342 17.5976 6.31658 17.2071 6.70711L14.2071 9.70711C13.8166 10.0976 13.1834 10.0976 12.7929 9.70711C12.4024 9.31658 12.4024 8.68342 12.7929 8.29289L14.0858 7H12.5C8.95228 7 6 9.95228 6 13.5C6 17.0477 8.95228 20 12.5 20C16.0477 20 19 17.0477 19 13.5C19 12.9477 19.4477 12.5 20 12.5C20.5523 12.5 21 12.9477 21 13.5C21 18.1523 17.1523 22 12.5 22C7.84772 22 4 18.1523 4 13.5C4 8.84772 7.84772 5 12.5 5H14.0858L12.7929 3.70711C12.4024 3.31658 12.4024 2.68342 12.7929 2.29289Z"
                        fill="#1DC0BD"></path>
                </svg>
            </button>
        </template>
    </div>
</template>

<script>
import Loader from "../Loader";

export default {
    props: [
        'auth_user'
    ],
    components: {
        Loader
    },
    data() {
        return {
            loader: false,
            tab: 'about_me_reviews',
            reply_review: {
                review_id: null,
                text: null,
            },
            all_reviews: {
                data: [],
                meta: {}
            },
            reviewed_reviews: {
                data: [],
                meta: {}
            },
            about_me_reviews: {
                data: [],
                meta: {}
            },
        }
    },
    methods: {
        getStarActive(rate) {
            rate = parseInt(rate)
            return rate > 0 && rate <= 5 ? rate : 0
        },
        getStarInactive(rate) {
            rate = parseInt(rate)
            return rate > 0 && rate <= 5 ? 5 - rate : 0
        },
        replyReview(id) {
            this.reply_review.review_id = id
            this.reply_review.text = null
        },
        setTab(tab = 'all_reviews') {
            this.tab = tab
        },
        saveReplyReview() {
            if (this.reply_review.text) {

                let data = {
                    review_id: this.reply_review.review_id,
                    text: this.reply_review.text
                }
                axios.post('/api/cabinet/reviews/reply', data).then(res => {
                    let replyReview = res.data.data
                    if (this.tab == 'about_me_reviews') {
                        this.about_me_reviews.data.forEach(item => {
                            if (item.id == replyReview.parent_id) {
                                item.reply = replyReview
                            }
                        })
                    } else {
                        this.all_reviews.data.forEach(item => {
                            if (item.id == replyReview.parent_id) {
                                item.reply = replyReview
                            }
                        })
                    }
                    // this.clearReplyReview()
                }).catch(err => {
                    alertModal(err.response.data)
                })
            } else {
                alertWarningModal('Напишите что-нибудь')
            }
        },
        clearReplyReview() {
            this.reply_review.review_id = null
            this.reply_review.text = null
        },
        getReviews() {
            this.loader = true
            let params = {
                page: this.all_reviews.meta.current_page ? this.all_reviews.meta.current_page + 1 : 1
            }
            axios.get('/api/cabinet/reviews', {params: params}).then(res => {
                this.loader = false
                if (!this.all_reviews.data.length) {
                    this.all_reviews = res.data
                } else {
                    if (res.data && res.data.data.length) {
                        res.data.data.forEach(item => {
                            this.all_reviews.data.push(item)
                        })
                    }
                    this.all_reviews.meta.current_page = res.data.meta.current_page
                    this.all_reviews.meta.last_page = res.data.meta.last_page
                }
            }).catch(err => {
                this.loader = false
                console.log('err', err)
            })
        },
        getReviewedReviews() {
            this.loader = true
            let params = {
                page: this.reviewed_reviews.meta.current_page ? this.reviewed_reviews.meta.current_page + 1 : 1
            }
            axios.get('/api/cabinet/reviewed-reviews', {params: params}).then(res => {
                this.loader = false
                if (!this.reviewed_reviews.data.length) {
                    this.reviewed_reviews = res.data
                } else {
                    if (res.data && res.data.data.length) {
                        res.data.data.forEach(item => {
                            this.reviewed_reviews.data.push(item)
                        })
                    }
                    this.reviewed_reviews.meta.current_page = res.data.meta.current_page
                    this.reviewed_reviews.meta.last_page = res.data.meta.last_page
                }
            }).catch(err => {
                this.loader = false
            })
        },
        getAboutMeReviews() {
            this.loader = true
            let params = {
                page: this.about_me_reviews.meta.current_page ? this.about_me_reviews.meta.current_page + 1 : 1
            }
            axios.get('/api/cabinet/about-me-reviews', {params: params}).then(res => {
                this.loader = false
                console.log(this.about_me_reviews.data.length, 'this.about_me_reviews.data.length')
                if (!this.about_me_reviews.data.length) {
                    this.about_me_reviews = res.data
                } else {
                    if (res.data && res.data.data.length) {
                        res.data.data.forEach(item => {
                            this.about_me_reviews.data.push(item)
                        })
                    }
                    this.about_me_reviews.meta.current_page = res.data.meta.current_page
                    this.about_me_reviews.meta.last_page = res.data.meta.last_page
                }
            }).catch(err => {
                this.loader = false
            })
        }
    },
    created() {
        this.getAboutMeReviews()
        this.getReviewedReviews()
        this.getReviews()
    },
    watch: {
        tab: {
            handler(val, oldVal) {

            }
        },
    }
}
</script>
<style>
.fa {
    margin-left: -12px;
    margin-right: 8px;
}
</style>
