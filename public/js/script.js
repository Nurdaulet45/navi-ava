function alertModal(text = '', timer = 1500) {
    Swal.fire({
        text: text ? text : 'Успешно сохранен!',
        padding: '2em',
        icon: 'success',
        showConfirmButton: false,
        timer: timer
    })
}


function clearInvalidFeedback() {
    $(".invalid-feedback").css("display", 'none');
    $(".invalid-feedback").text("");
}
function enableDisableRegisterButton() {
    let confirm_policy = document.getElementById(`register_confirm_policy`)
    let form_button = document.getElementById(`register-button`)

    console.log('confirm_policy', confirm_policy)
    console.log('form_button', form_button)
    if (confirm_policy.checked) {
        return form_button.disabled = false
    } else {
        return form_button.disabled = true
    }
}

$(function () {
    $("#registerForm").submit(function (e) {
        e.preventDefault();

        let full_name = $('#register_full_name').val();
        let confirm_policy = document.getElementById(`register_confirm_policy`).checked;
        let email = $('#register_email').val();
        let phone = $('#register_phone').val();
        let password = $('#register_password').val();
        let password_confirm = $('#register_password_confirm').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $(".loader").addClass("loading");
        clearInvalidFeedback()

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            type: "POST",
            data: {
                '_token': _token,
                'full_name': full_name,
                'email': email,
                'phone': phone,
                'password': password,
                'password_confirmation': password_confirm,
                'confirm_policy': confirm_policy,
            },
            success: function (res) {
                $(document).find('#container-register').removeClass('show');
                $(".loader").removeClass("loading");
                alertModal('Вы успешно зарегистрировались!');
                setTimeout(() => {
                    window.location.reload()
                }, 1500)


            },
            error: function (err) {
                $(".loader").removeClass("loading");
                let response_text = JSON.parse(err.responseText);
                if (response_text.errors && typeof response_text.errors == 'object') {
                    Object.entries(response_text.errors).forEach(([key, value]) => {
                        $('#error-register-' + key).text(value[0]);
                        $('#error-register-' + key).css('display', 'block');
                    })
                }
            }
        });

    });
    $("#editUserForm").submit(function (e) {
        e.preventDefault();

        let full_name = $('#edit-full_name').val();
        let email = $('#edit-email').val();
        let phone = $('#edit-phone').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $(".loader").addClass("loading");
        clearInvalidFeedback()

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            type: "POST",
            data: {
                '_token': _token,
                'full_name': full_name,
                'email': email,
                'phone': phone,
            },
            success: function (res) {
                closeModal(e)
                $(".loader").removeClass("loading");
                // console.log('res', res)
                // $('.modal').modal('hide')
                $(document).find('#container-edit-password').removeClass('show');
                alertModal();
                setTimeout(() => {
                    window.location.reload()
                }, 1500)
            },
            error: function (err) {
                $(".loader").removeClass("loading");
                let response_text = JSON.parse(err.responseText);
                if (response_text.errors && typeof response_text.errors == 'object') {
                    Object.entries(response_text.errors).forEach(([key, value]) => {
                        $('#error-edit-' + key).text(value[0]);
                        $('#error-edit-' + key).css('display', 'block');
                    })
                }
            }
        });
    });
    $("#changePasswordForm").submit(function (e) {
        e.preventDefault();

        let password = $('#edit-user-password').val();
        let password_confirm = $('#edit-user-password_confirm').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $(".loader").addClass("loading");
        clearInvalidFeedback()
        console.log('password', password)
        console.log('password_confirm', password_confirm)

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            type: "POST",
            data: {
                '_token': _token,
                'password': password,
                'password_confirmation': password_confirm,
            },
            success: function (res) {
                closeModal(e)
                // console.log('res', res)
                // $('.modal').modal('hide')
                // $(document).find('#container-register').removeClass('show');
                $(".loader").removeClass("loading");
                alertModal();
                setTimeout(() => {
                    window.location.reload()
                }, 1500)
            },
            error: function (err) {
                $(".loader").removeClass("loading");
                let response_text = JSON.parse(err.responseText);
                console.log('response_text.errors', response_text.errors)
                if (response_text.errors && typeof response_text.errors == 'object') {
                    Object.entries(response_text.errors).forEach(([key, value]) => {
                        console.log('#error-editP-' + key)
                        $('#error-editP-' + key).text(value[0]);
                        $('#error-editP-' + key).css('display', 'block');
                    })
                }
            }
        });
    });

    $("#editUserPassword").submit(function (e) {
        e.preventDefault();

        let password = $('#edit-password').val();
        let password_confirm = $('#edit-password_confirm').val();
        console.log('password', password)
        console.log('password_confirm', password_confirm)
        let _token = $('meta[name="csrf-token"]').attr('content');
        $(".loader").addClass("loading");
        clearInvalidFeedback()

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            type: "POST",
            data: {
                '_token': _token,
                'password': password,
                'password_confirmation': password_confirm,
            },
            success: function (res) {
                closeModal(e)
                // console.log('res', res)
                // $('.modal').modal('hide')
                // $(document).find('#container-register').removeClass('show');
                $(".loader").removeClass("loading");
                alertModal();
                setTimeout(() => {
                    window.location.reload()
                }, 1500)
            },
            error: function (err) {
                $(".loader").removeClass("loading");
                let response_text = JSON.parse(err.responseText);
                if (response_text.errors && typeof response_text.errors == 'object') {
                    Object.entries(response_text.errors).forEach(([key, value]) => {
                        console.log(key)
                        $('#error-edit-' + key).text(value[0]);
                        $('#error-edit-' + key).css('display', 'block');
                    })
                }
            }
        });
    });

    $('#loginForm').submit(function (e) {
        e.preventDefault();
        // $('span.error-text-login').text();

        let phone = $('#login_phone').val();
        let password = $('#login_password').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $(".loader").addClass("loading");

        clearInvalidFeedback()

        console.log('phone', phone)
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: {
                'phone': phone,
                'password': password,
                '_token': _token
            },
            success: function (res) {
                $(".loader").removeClass("loading");
                window.location.reload();
            },
            error: function (err) {
                console.log('err', err)
                console.log('err', err.response)
                $(".loader").removeClass("loading");

                let response_text = JSON.parse(err.responseText);
                if (response_text.errors && typeof response_text.errors == 'object') {
                    Object.entries(response_text.errors).forEach(([key, value]) => {
                        $('#error-login-' + key).text(value[0]);
                        $('#error-login-' + key).css('display', 'block');
                    })
                }

                // $('#error-login-email').text(response_text.errors.email);
                // $('#error-login-email').css('display','block');
                // $('#error-login-password').text(response_text.errors.password);
                // $('#error-login-password').css('display','block');
                // let response_text = JSON.parse(err.responseText);
                // $('#modal-app-form-error').text(response_text.errors.email);
            }
        });
    });
    $('#resetPasswordForm').submit(function (e) {
        e.preventDefault();

        let email = $('#reset_password_email').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $(".loader").addClass("loading");
        clearInvalidFeedback()
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: {
                'email': email,
                '_token': _token
            },
            success: function (res) {
                $(".loader").removeClass("loading");
                closeModal(e)
                alertModal('Проверьте свою электронную почту', 3000);
            },
            error: function (err) {
                console.log('err', err)
                $(".loader").removeClass("loading");

                let response_text = JSON.parse(err.responseText);
                if (response_text.errors && typeof response_text.errors == 'object') {
                    Object.entries(response_text.errors).forEach(([key, value]) => {
                        $('#error-reset_password-' + key).text(value[0]);
                        $('#error-reset_password-' + key).css('display', 'block');
                    })
                }
            }
        });
    });
});


$('#burger-btn').click(function (event) {
    burgerMenu();
});

function burgerMenu() {
    $('.mobile-menu').toggleClass('active');
    $('body').toggleClass('active');
    $('.overflow').toggleClass('active');
}


// var swiper = new Swiper(".mySwiper", {
//     slidesPerView: 'auto',
//     spaceBetween: 30,
//     centeredSlides: true,
// });



function openCommentReplyForm(comment_id) {
    $(`.comment-reply`).css('display', 'none')
    $(`.comment-reply-${comment_id}`).css('display', 'block')
    $(`.answer-comment-reply`).css('display', 'block')
    $(`.answer-comment-reply-${comment_id}`).css('display', 'none')
    // console.log('comment_id', comment_id)
    // console.log('e', e)

}
function openLogin(e) {
    $('.modal').modal('hide');
    setTimeout(() => {
        $('#loginPopup').modal('show');
    }, 500)
}

function openResetPassword(e) {
    // $('#container-reset-password').addClass('show');
    $('.modal').modal('hide');
    setTimeout(() => {
        $('#resetPasswordPopup').modal('show');
    }, 500)
}

function openRegister(e) {
    $('.modal').modal('hide')
    setTimeout(() => {
        $('#registerPopup').modal('show');
    }, 500)
    // $('#container-register').addClass('show');
}

function closeModal(e) {
    $(".container-modal").removeClass("show");
    return $(e).closest('.container-modal').removeClass('show');
}

function openRegisterLink(e) {
    closeModal(e)
    openRegister();
}

function openLoginLink(e) {
    // burgerMenu();
    closeModal(e)
    openLogin();
}
function openResetPasswordLink(e) {
    closeModal(e)
    openResetPassword();
}

function openEditUser(e) {
    $('#container-edituser').addClass('show');
}

function openEditUserPassword(e) {
    $('#container-edit-password').addClass('show');
}

function openUploadImage(e) {
    $('#container-uploadimage').addClass('show');
}


let accordions = document.getElementsByClassName("accordion");

for (let i = 0; i < accordions.length; i++) {
    accordions[i].addEventListener("click", function () {
        this.classList.toggle("active");

        let panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            panel.style.borderBottomColor = "transparent";
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
            panel.style.borderBottomColor = "#949494";
        }
    });
}

let accordionsHeader = document.getElementsByClassName("accordion-header");
for (let i = 0; i < accordionsHeader.length; i++) {
    accordionsHeader[i].addEventListener("click", function () {
        this.classList.toggle("active");
        let panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}

let accordionsQuestionHeader = document.getElementsByClassName("question-header");
for (let i = 0; i < accordionsQuestionHeader.length; i++) {
    accordionsQuestionHeader[i].addEventListener("click", function () {
        this.classList.toggle("active");
        let panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}


function change_file_input(el, number) {
    let file_n = ''

    $(el).each(function () {
        let fileName = $(this).val().split('/').pop().split('\\').pop();
        file_n = fileName
    })

    let re = /(\.jpg|\.jpeg|\.png|\.doc|\.docx|\.pdf|\.txt|\.xls|\.xlsx)$/i;

    let parent = $(el).closest('form')

    if (!re.exec(file_n)) {
        parent.find('.input-file' + number + ' p').text('Выбран неверный формат файла ').css('color', '#981323')

        // setTimeout(function () {
        //     parent.find('.input-file p').text('Файлды тіркеу (20 мб дейін) ').css('color', '#B0B0B0')
        //     $(el).val('')
        // }, 2000)
    } else {
        parent.find('.input-file' + number + ' p').text('Файл выбран ').css('color', '#4AAF30')
        parent.find('.input-file' + number).css('border-color', '#4AAF30')
    }
}

function upload_image_file(el) {
    let file_n = ''

    $(el).each(function () {
        let fileName = $(this).val().split('/').pop().split('\\').pop();
        file_n = fileName
    })

    let re = /(\.jpg|\.jpeg|\.png)$/i;

    let parent = $(el).closest('form')

    if (!re.exec(file_n)) {

        parent.find('.input-file p').text('Неправильный формат изображения ').css('color', '#981323')

        // setTimeout(function () {
        //     parent.find('.input-file p').text('Файлды тіркеу (20 мб дейін) ').css('color', '#B0B0B0')
        //     $(el).val('')
        // }, 2000)
    } else {
        parent.find('.input-file p').text('Файл выбран ').css('color', '#4AAF30')
    }
}


function change_file_input(el, number) {
    let file_n = ''

    $(el).each(function () {
        let fileName = $(this).val().split('/').pop().split('\\').pop();
        file_n = fileName
    })

    let re = /(\.jpg|\.jpeg|\.png|\.doc|\.docx|\.pdf|\.txt|\.xls|\.xlsx)$/i;

    let parent = $(el).closest('form')

    if (!re.exec(file_n)) {
        if (file_n) {
            parent.find('.input_file_' + number + ' span.text').text('Қате файл пішімі таңдалды ').css('color', '#981323')
        } else {
            parent.find('.input_file_' + number + ' span.text').text('Файл жүктеу ').css('color', '#EA474A')
            parent.find('.input_file_' + number).css('border-color', '#EA474A')
        }

        // setTimeout(function () {
        //     parent.find('.input-file p').text('Файлды тіркеу (20 мб дейін) ').css('color', '#B0B0B0')
        //     $(el).val('')
        // }, 2000)EA474A
    } else {
        // parent.find('.input_file_' + number ).text(file_n).css('color', '#4AAF30')
        // parent.find('.input_file_' + number).css('border-color', '#4AAF30')

        parent.find('.input_file_' + number).css('display', 'none')
        parent.find('.input_file_' + number + '_uploaded').css('display', 'block')
        parent.find('.input_file_' + number + '_uploaded span.text').text(file_n)
    }
}
function deleteInputFile(el, num) {
    $('#input_file_' + num).val("")
    let parent = $(el).closest('form')
    parent.find('.input_file_' + num + ' span.text').text('Файл жүктеу ').css('color', '#EA474A')
    // parent.find('.input_file_' + num ).text('Файл жүктеу ').css('color', '#4AAF30')
    parent.find('.input_file_' + num).css('border-color', '#EA474A')
    parent.find('.input_file_' + num).css('display', 'flex')
    parent.find('.input_file_' + num + '_uploaded').css('display', 'none')
    parent.find('.input_file_' + num + '_uploaded .text').text('')
}




