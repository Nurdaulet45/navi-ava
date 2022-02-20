<template>
    <div>
        <loader v-if="loader"/>
        <button class="btn btn-default btn-add-certification medium-btn" @click.prevent="addCertification()" v-if="!is_add_certification">
            Добавить документ

            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4C12.5523 4 13 4.44772 13 5L13 11L19 11C19.5523 11 20 11.4477 20 12C20 12.5523 19.5523 13 19 13H13V19C13 19.5523 12.5523 20 12 20C11.4477 20 11 19.5523 11 19L11 13L5 13C4.44772 13 4 12.5523 4 12C4 11.4477 4.44772 11 5 11H11V5C11 4.44772 11.4477 4 12 4Z" fill="white"/>
            </svg>

        </button>
        <div class="about-me-form about-me-form-certifications">
            <template v-if="new_certifications.length && is_add_certification">
                <div v-for="(new_certification, new_certification_index) in new_certifications">
                    <div class="form-group">
                        <div class="head">
                            <label for="">
                                Название документа
                                <div class="dropdown-menu dropdown-document-help">
                                    <span class="dropdown-body">
                                          <svg width="20" class="icon-info" height="20" viewBox="0 0 20 20" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.99935 3.33341C6.31745 3.33341 3.33268 6.31818 3.33268 10.0001C3.33268 13.682 6.31745 16.6667 9.99935 16.6667C13.6813 16.6667 16.666 13.682 16.666 10.0001C16.666 6.31818 13.6813 3.33341 9.99935 3.33341ZM1.66602 10.0001C1.66602 5.39771 5.39697 1.66675 9.99935 1.66675C14.6017 1.66675 18.3327 5.39771 18.3327 10.0001C18.3327 14.6024 14.6017 18.3334 9.99935 18.3334C5.39697 18.3334 1.66602 14.6024 1.66602 10.0001Z"
                                                fill="#D6FFFE"/>
                                            <path
                                                d="M9.99935 8.33325C10.4596 8.33325 10.8327 8.70634 10.8327 9.16659V14.1666C10.8327 14.6268 10.4596 14.9999 9.99935 14.9999C9.5391 14.9999 9.16602 14.6268 9.16602 14.1666V9.16659C9.16602 8.70634 9.5391 8.33325 9.99935 8.33325Z"
                                                fill="#D6FFFE"/>
                                            <path
                                                d="M11.25 6.25C11.25 6.94036 10.6903 7.5 10 7.5C9.30967 7.5 8.75 6.94036 8.75 6.25C8.75 5.55964 9.30967 5 10 5C10.6903 5 11.25 5.55964 11.25 6.25Z"
                                                fill="#D6FFFE"/>
                                        </svg>
                                    </span>
                                    <div class="dropdown-content dropdown-document-help-content">
                                        Расскажите о своей профессии, интересах, увлечениях, хобби
                                    </div>
                                </div>
                            </label>
                            <button class="delete-text" @click.prevent="deleteCertificate(new_certification,new_certification_index)">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 4C7 2.89543 7.89543 2 9 2H15C16.1046 2 17 2.89543 17 4V6H18.9897C18.9959 5.99994 19.0021 5.99994 19.0083 6H21C21.5523 6 22 6.44772 22 7C22 7.55228 21.5523 8 21 8H19.9311L19.0638 20.1425C18.989 21.1891 18.1182 22 17.0689 22H6.93112C5.88184 22 5.01096 21.1891 4.9362 20.1425L4.06888 8H3C2.44772 8 2 7.55228 2 7C2 6.44772 2.44772 6 3 6H4.99174C4.99795 5.99994 5.00414 5.99994 5.01032 6H7V4ZM9 6H15V4H9V6ZM6.07398 8L6.93112 20H17.0689L17.926 8H6.07398Z"
                                        fill="#E40904"/>
                                </svg>
                                Удалить документ
                            </button>
                        </div>
                        <input type="text" class="form-control input-default" name="name"
                               v-model="new_certification.name"
                               placeholder="Введите название">
                        <validation-error :errors="errorFor('certifications.'+new_certification_index+'.name')"/>
                    </div>
                    <div class="form-group">
                        <label for="">
                            Описание
                            <div class="dropdown-menu dropdown-about-me">
                        <span class="dropdown-body">
                              <svg width="20" class="icon-info" height="20" viewBox="0 0 20 20" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.99935 3.33341C6.31745 3.33341 3.33268 6.31818 3.33268 10.0001C3.33268 13.682 6.31745 16.6667 9.99935 16.6667C13.6813 16.6667 16.666 13.682 16.666 10.0001C16.666 6.31818 13.6813 3.33341 9.99935 3.33341ZM1.66602 10.0001C1.66602 5.39771 5.39697 1.66675 9.99935 1.66675C14.6017 1.66675 18.3327 5.39771 18.3327 10.0001C18.3327 14.6024 14.6017 18.3334 9.99935 18.3334C5.39697 18.3334 1.66602 14.6024 1.66602 10.0001Z"
                                fill="#D6FFFE"/>
                            <path
                                d="M9.99935 8.33325C10.4596 8.33325 10.8327 8.70634 10.8327 9.16659V14.1666C10.8327 14.6268 10.4596 14.9999 9.99935 14.9999C9.5391 14.9999 9.16602 14.6268 9.16602 14.1666V9.16659C9.16602 8.70634 9.5391 8.33325 9.99935 8.33325Z"
                                fill="#D6FFFE"/>
                            <path
                                d="M11.25 6.25C11.25 6.94036 10.6903 7.5 10 7.5C9.30967 7.5 8.75 6.94036 8.75 6.25C8.75 5.55964 9.30967 5 10 5C10.6903 5 11.25 5.55964 11.25 6.25Z"
                                fill="#D6FFFE"/>
                        </svg>
                        </span>
                                <div class="dropdown-content dropdown-about-me-content">
                                    Расскажите о своей профессии, интересах, увлечениях, хобби
                                </div>
                            </div>
                        </label>
                        <textarea name="description" class="form-control textarea-default" id="" cols="30" rows="6"
                                  v-model="new_certification.description"
                                  placeholder="Напишите что-нибудь"></textarea>

                        <validation-error :errors="errorFor('certifications.'+new_certification_index+'.description')"/>
                    </div>
                    <div class="form-group">
                        <label>
                            Добавьте фото
                        </label>
                        <span class="info">Не допускаются к размещению фотографии с водяными знаками,
                            чужих объектов и рекламные баннеры. JPG, PNG или GIF. Максимальный размер файла 10 мб
                        </span>
                        <div class="file-input-form-default  mt-10">

                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.79289 4.79289C8.98043 4.60536 9.23478 4.5 9.5 4.5L15.5 4.5C15.7652 4.5 16.0196 4.60536 16.2071 4.79289L17.9142 6.5L20.5 6.5C21.6046 6.5 22.5 7.39543 22.5 8.5L22.5 18.5C22.5 19.6046 21.6046 20.5 20.5 20.5L4.5 20.5C3.39543 20.5 2.5 19.6046 2.5 18.5L2.5 8.5C2.5 7.39543 3.39543 6.5 4.5 6.5L7.08579 6.5L8.79289 4.79289ZM9.91421 6.5L8.20711 8.20711C8.01957 8.39464 7.76522 8.5 7.5 8.5H4.5L4.5 18.5L20.5 18.5L20.5 8.5H17.5C17.2348 8.5 16.9804 8.39464 16.7929 8.20711L15.0858 6.5H9.91421ZM12.5 11C11.3954 11 10.5 11.8954 10.5 13C10.5 14.1046 11.3954 15 12.5 15C13.6046 15 14.5 14.1046 14.5 13C14.5 11.8954 13.6046 11 12.5 11ZM8.5 13C8.5 10.7909 10.2909 9 12.5 9C14.7091 9 16.5 10.7909 16.5 13C16.5 15.2091 14.7091 17 12.5 17C10.2909 17 8.5 15.2091 8.5 13Z" fill="#1DC0BD"/>
                            </svg>
                            <div class="upload-text">
                                Загрузить файл с устройства
                            </div>
                            <p>{{ typeof new_certification.image == 'string' ? new_certification.image : (new_certification.image ? new_certification.image.name  : null)}}</p>
                            <input type="file"
                                   accept="image/png, image/gif, image/jpeg"
                                   :ref="'image'+ new_certification_index" @change.prevent="handleImage(new_certification_index)" name="image" >
                        </div>
                        <validation-error :errors="errorFor('certifications.'+new_certification_index+'.image')"/>
                    </div>
                    <div class="line" v-if="(new_certification_index+1) != new_certifications.length"></div>

                </div>
                <div class="line"></div>
                <button class="btn-upload-file" @click.prevent="addCertification()">


                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.0007 5.33337C16.7371 5.33337 17.334 5.93033 17.334 6.66671V14.6667L25.334 14.6667C26.0704 14.6667 26.6673 15.2636 26.6673 16C26.6673 16.7364 26.0704 17.3334 25.334 17.3334L17.334 17.3334L17.334 25.3334C17.334 26.0698 16.7371 26.6667 16.0007 26.6667C15.2643 26.6667 14.6673 26.0698 14.6673 25.3334L14.6673 17.3334H6.66732C5.93094 17.3334 5.33398 16.7364 5.33398 16C5.33398 15.2636 5.93094 14.6667 6.66732 14.6667L14.6673 14.6667L14.6673 6.66671C14.6673 5.93033 15.2643 5.33337 16.0007 5.33337Z" fill="#1DC0BD"/>
                    </svg>

                    Добавить документ
                </button>
                <button class="btn-default small-btn w-100" @click.prevent="saveCertifications()">
                    Сохранить
                </button>
            </template>
            <div class="empty" v-else-if="is_add_certification && !certifications.length">
                <div class="text">Вы пока не загрузили ни одного документа</div>
                <button class="btn-default medium-btn" @click.prevent="addCertification()">
                    Добавить документ
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 4C13.0523 4 13.5 4.44772 13.5 5L13.5 11L19.5 11C20.0523 11 20.5 11.4477 20.5 12C20.5 12.5523 20.0523 13 19.5 13H13.5V19C13.5 19.5523 13.0523 20 12.5 20C11.9477 20 11.5 19.5523 11.5 19L11.5 13L5.5 13C4.94772 13 4.5 12.5523 4.5 12C4.5 11.4477 4.94772 11 5.5 11H11.5V5C11.5 4.44772 11.9477 4 12.5 4Z" fill="white"/>
                    </svg>
                </button>
            </div>
            <div v-else>
                <div class="certification-items">
                    <div class="mb-title">Загруженные файлы ({{ certifications.length }})</div>
                    <div class="certification-item" v-for="certificate in certifications">
                        <div class="left">
                            <div class="name">
                                {{ certificate.name }}
                            </div>
                            <div class="description">
                                {{ certificate.description }}
                            </div>
                        </div>
                        <div class="right">
                            <a :href="certificate.url" target="_blank" class="btn-default medium-btn">
                                Скачать сертификат
                            </a>
                            <button class="btn-blue-white medium-btn" @click.prevent="openCertification(certificate)">
                                Открыть сертификат
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import Loader from "../Loader";
import ValidationError from "../../shared/components/ValidationError";
import validationError from "../../shared/mixins/validationError";
export default {
    props: [
    ],
    mixins: [ validationError ],
    components: {
        Loader,
        ValidationError
    },
    data() {
        return {
            loader: false,
            certifications: [],
            is_add_certification: false,
            max_size_image: 10240,
            new_certifications: []
        }
    },
    methods: {
        deleteCertificate(certificate,new_certification_index) {
            if (certificate.id) {
                axios.delete(`api/cabinet/certifications/${certificate.id}`).then(res => {
                    this.getCertifications()
                }).catch(err => {
                    console.log('res', err)
                })
            }
            this.new_certifications = this.new_certifications.filter((item, index)=> {
                return index != new_certification_index
            })
        },
        handleImage(new_certification_index) {
            let file = this.$refs['image' + new_certification_index][0].files[0]
            if (file) {
                let re = /(\.jpg|\.jpeg|\.png|\.doc|\.docx|\.pdf|\.txt|\.xls|\.xlsx)$/i;

                if (!re.exec(file.name)) {
                    alertWarningModal('Файл форматы қате')
                }
                let size = file.size / 1024;
                if (size > this.max_size_image) {
                    return alertWarningModal(`Размер файла превышает ${this.max_size_image / 1024} мб`)
                } else {
                    this.new_certifications[new_certification_index].image = file
                }
            } else {
                this.new_certifications[new_certification_index].image = null
            }
        },
        openCertification(certificate) {
            this.new_certifications.push(JSON.parse(JSON.stringify(certificate)))
            this.is_add_certification = true
        },
        addCertification() {
            let certificate = {
                id: null,
                name: null,
                description: null,
                image: null,
            }
            this.new_certifications.push(certificate)
            this.is_add_certification = true
        },
        saveCertifications() {
            this.errors = null
            if (!this.new_certifications.length) {
                return alertWarningModal('Сертификаты не заполнены')
            }
            let data = new FormData();
            this.new_certifications.forEach((item, index) => {
                data.append(`certifications[${index}][id]`, item.id)
                data.append(`certifications[${index}][name]`, item.name)
                data.append(`certifications[${index}][description]`, item.description)
                data.append(`certifications[${index}][image]`, item.image)
            })
            axios.post('api/cabinet/certifications', data, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            }).then(res => {
                this.getCertifications()
                this.new_certifications = [];
                this.is_add_certification = false;

            }).catch(err => {
                this.errors = err.response.data.errors
                alertWarningModal(err.response.data.message)
            })
        },
        getCertifications() {
            this.loader = true
            axios.get('api/cabinet/certifications').then(res => {
                this.loader = false
                this.certifications = res.data.data
            }).catch(err => {
                this.loader = false
                if (err.response.status == 422) {
                    alertModal('Не все поле заполнено')
                } else {
                    alertModal(err.response.data.message)
                }
            })
        }
    },
    created() {
        this.getCertifications()
    },


}
</script>
<style>
.fa {
    margin-left: -12px;
    margin-right: 8px;
}
</style>
