function alertModal(text = '', timer = 1500) {
    Swal.fire({
        text: text ? text : 'Успешно сохранен!',
        padding: '2em',
        icon: 'success',
        showConfirmButton: false,
        timer: timer
    })
}

function alertWarningModal(text = '') {
    Swal.fire({
        text: text ? text : 'Ошибка!',
        padding: '2em',
        icon: 'warning',
        showConfirmButton: true,
    })
}

function clearInvalidFeedback() {
    $(".invalid-feedback").css("display", 'none');
    $(".invalid-feedback").text("");
}

function testFunction(e, url) {
    if ($(e.target).hasClass('favorites')) {

    } else if ($(e.target).hasClass('contact')) {
        window.location.href = url
    } else {
        window.location.href = url
    }
}

$(function () {
    $("#registerForm").submit(function (e) {
        e.preventDefault();

        let first_name = $('#register-first_name').val();
        let last_name = $('#register-last_name').val();
        let email = $('#register-email').val();
        let phone = $('#register-phone').val();
        let password = $('#register-password').val();
        let password_confirmation = $('#register-password_confirmation').val();
        let confirm_site_rules = $("input[name=confirm_site_rules]").is(':checked');
        let confirm_privacy_policy = $("input[name=confirm_privacy_policy]").is(':checked');
        let user_type = $("#register-user_type").val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $(".loader").addClass("loading");
        clearInvalidFeedback()

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            type: "POST",
            data: {
                '_token': _token,
                'first_name': first_name,
                'last_name': last_name,
                'email': email,
                'phone': phone,
                'password': password,
                'password_confirmation': password_confirmation,
                'confirm_site_rules': confirm_site_rules,
                'confirm_privacy_policy': confirm_privacy_policy,
                'user_type': user_type,
            },
            success: function (res) {
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
    $("#prevRegisterForm").submit(function (e) {
        e.preventDefault();

        let email = $('#register-email').val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $(".loader").addClass("loading");
        clearInvalidFeedback()

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            type: "POST",
            data: {
                '_token': _token,
                'email': email,
            },
            success: function (res) {
                $(".loader").removeClass("loading");
                if (res.data && res.data.success) {
                    nextRegisterForm()
                }
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
        // console.log('password', password)
        // console.log('password_confirm', password_confirm)

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
                // console.log('response_text.errors', response_text.errors)
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
                        $('#error-edit-' + key).text(value[0]);
                        $('#error-edit-' + key).css('display', 'block');
                    })
                }
            }
        });
    });

    $('#sendVerifyEmailForm').submit(function (e) {
        e.preventDefault();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $(".loader").addClass("loading");

        clearInvalidFeedback()

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: {
                '_token': _token
            },
            success: function (res) {
                console.log(res.data, res.data.success)
                $(".loader").removeClass("loading");
                if (res.data && res.data.success) {
                    alertModal(res.data.message, 3000);
                }
            },
            error: function (err) {
                $(".loader").removeClass("loading");

                let response_text = JSON.parse(err.responseText);
                if (response_text.errors && typeof response_text.errors == 'object') {
                    Object.entries(response_text.errors).forEach(([key, value]) => {
                        alertWarningModal(value[0])
                        // $('#error-verify_email-' + key).text(value[0]);
                        // $('#error-verify_email-' + key).css('display', 'block');
                    })
                }
            }
        });
    });
    $('#loginForm').submit(function (e) {
        e.preventDefault();
        let email_or_phone = $('#login-email_or_phone').val();
        let password = $('#login-password').val();
        let remember = $("input[name=remember]").is(':checked');
        let _token = $('meta[name="csrf-token"]').attr('content');
        $(".loader").addClass("loading");

        clearInvalidFeedback()

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: {
                'email_or_phone': email_or_phone,
                'remember': remember,
                'password': password,
                '_token': _token
            },
            success: function (res) {
                $(".loader").removeClass("loading");
                if (res.data && res.data.success) {
                    window.location.reload();
                }
            },
            error: function (err) {
                $(".loader").removeClass("loading");

                let response_text = JSON.parse(err.responseText);
                if (response_text.errors && typeof response_text.errors == 'object') {
                    Object.entries(response_text.errors).forEach(([key, value]) => {
                        $('#error-login-' + key).text(value[0]);
                        $('#error-login-' + key).css('display', 'block');
                    })
                }
            }
        });
    });
    $('#resetPasswordForm').submit(function (e) {
        e.preventDefault();

        let email = $('#reset_password-email').val();
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

    $("#profile_is_service_payable").change(function () {
        if ($('#profile_is_service_payable').is(':checked')) {
            $('.service-price').css('display', 'block')
        } else {
            $('.service-price').css('display', 'none')
        }
    });
});

function previewImage(previewAttrId) {
    if (event.target.files[0]) {
        let re = /(\.jpg|\.jpeg|\.png|\.doc|\.docx|\.pdf|\.txt|\.xls|\.xlsx)$/i;

        if (!re.exec(event.target.files[0].name)) {
            alertWarningModal('Файл форматы қате')
        } else {
            let reader = new FileReader();
            reader.onload = (e) => {
                $(`#${previewAttrId}`).attr('src', e.target.result);
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    }
}

$('#burger-btn').click(function (event) {
    burgerMenu();
});

function burgerMenu() {
    $('.mobile-menu').toggleClass('active');
    $('body').toggleClass('active');
    $('.overflow').toggleClass('active');
}

function openLogin(e) {
    $('.modal').modal('hide');
    setTimeout(() => {
        $('#loginPopup').modal('show');
    }, 500)
}

function openWhoLooking(e) {
    $('.modal').modal('hide');
    setTimeout(() => {
        $('#whoLookingPopup').modal('show');
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
    // $('.prev-register').css('display', 'block')
    $('.only-register').css('display', 'block')

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

function nextRegisterForm(e) {
    $('.prev-register').css('display', 'none')
    $('.only-register').css('transition', '0.3s eye')
    $('.only-register').css('display', 'block')
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

let accordions = document.getElementsByClassName("accordion-filter");

for (let i = 0; i < accordions.length; i++) {
    accordions[i].classList.add('active');
    let panel = accordions[i].nextElementSibling;
    panel.style.maxHeight = panel.scrollHeight + "px";
    panel.style.borderBottomColor = "#949494";
}

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


$('.select').each(function () {
    const _this = $(this),
        selectOption = _this.find('option'),
        selectOptionLength = selectOption.length,
        selectedOption = selectOption.filter(':selected'),
        duration = 250; // длительность анимации

    _this.hide();
    _this.wrap('<div class="select"></div>');
    $('<div>', {
        class: 'new-select',
        text: _this.children('option:disabled').text()
    }).insertAfter(_this);

    const selectHead = _this.next('.new-select');
    $('<div>', {
        class: 'new-select__list'
    }).insertAfter(selectHead);

    const selectList = selectHead.next('.new-select__list');
    for (let i = 1; i < selectOptionLength; i++) {
        $('<div>', {
            class: 'new-select__item',
            html: $('<span>', {
                text: selectOption.eq(i).text()
            })
        })
            .attr('data-value', selectOption.eq(i).val())
            .appendTo(selectList);
    }

    const selectItem = selectList.find('.new-select__item');
    selectList.slideUp(0);
    selectHead.on('click', function () {
        if (!$(this).hasClass('on')) {
            $(this).addClass('on');
            selectList.slideDown(duration);

            selectItem.on('click', function () {
                let chooseItem = $(this).data('value');

                $('select').val(chooseItem).attr('selected', 'selected');
                selectHead.text($(this).find('span').text());

                selectList.slideUp(duration);
                selectHead.removeClass('on');
            });

        } else {
            $(this).removeClass('on');
            selectList.slideUp(duration);
        }
    });
});


function renderHtmlDeleteFavouriteButton(mentorInformationId, favouriteId) {
    return `
            <div id="favorite-btn-${mentorInformationId}"
                 class="btn-white-green w-auto"
                 onclick="deleteToFavorite(${favouriteId},${mentorInformationId})">
                Убрать из избранного &nbsp;
                <svg width="17" height="16" viewBox="0 0 17 16">
                    <path
                        d="M8.4987 3.01843C6.92815 1.61126 4.51287 1.66231 3.00361 3.17157C1.44151 4.73367 1.44151 7.26633 3.00361 8.8284L7.5559 13.3807C8.07657 13.9014 8.92083 13.9014 9.4415 13.3807L13.9938 8.8284C15.5559 7.26633 15.5559 4.73367 13.9938 3.17157C12.4845 1.66231 10.0692 1.61126 8.4987 3.01843ZM7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                        fill="#1DC0BD"/>
                    <path
                        d="M7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                        fill="#1DC0BD"/>
                </svg>
            </div>
            `;
}

function renderHtmlSaveFavouriteButton(mentorInformationId) {
    return `
           <div id="favorite-btn-${mentorInformationId}"
                 class="btn-white-green w-auto"
                 onclick="saveToFavorite(${mentorInformationId})">
                Добавить в избранное &nbsp;
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.49968 3.01843C6.92913 1.61126 4.51384 1.66231 3.00458 3.17157C1.44248 4.73367 1.44248 7.26633 3.00458 8.8284L7.55688 13.3807C8.07754 13.9014 8.92181 13.9014 9.44248 13.3807L13.9947 8.8284C15.5569 7.26633 15.5569 4.73367 13.9947 3.17157C12.4855 1.66231 10.0702 1.61126 8.49968 3.01843ZM7.71861 4.11438L8.02828 4.42403C8.28861 4.68437 8.71074 4.68437 8.97108 4.42403L9.28074 4.11438C10.3221 3.07299 12.0105 3.07299 13.0519 4.11438C14.0933 5.15578 14.0933 6.8442 13.0519 7.8856L8.49968 12.4379L3.94739 7.8856C2.906 6.8442 2.906 5.15578 3.94739 4.11438C4.98879 3.07299 6.67723 3.07299 7.71861 4.11438Z"
                        fill="#1DC0BD"/>
                </svg>
            </div>
            `;
}

function saveToFavorite(mentorInformationId) {
    let _token = $('meta[name="csrf-token"]').attr('content')

    $(".loader").addClass("loading")
    $.ajax({
        url: "/cabinet/favorite/save",
        method: "POST",
        data: {
            '_token': _token,
            mentorInformationId: mentorInformationId,
        },
        success: function (responce) {
            $(".loader").removeClass("loading")
            if (responce.status) {
                alertModal('Вы успешно добавили в избранный!')
                $('#favorite-btn-' + mentorInformationId).replaceWith(renderHtmlDeleteFavouriteButton(mentorInformationId, responce.userFavoriteId));
                clickDesibledButton()
            }
        },
        error: function (error) {
            $(".loader").removeClass("loading")
        }
    });
}

function deleteToFavorite(userFavoriteId, mentorInformationId) {
    let _token = $('meta[name="csrf-token"]').attr('content')

    $(".loader").addClass("loading")
    $.ajax({
        url: "/cabinet/favorite/delete",
        method: "POST",
        data: {
            '_token': _token,
            userFavoriteId: userFavoriteId,
        },
        dataType: 'json',
        success: function (responce) {
            $(".loader").removeClass("loading")
            if (responce.status) {
                alertModal('Вы успешно удалили в избранный!')
                $('#favorite-btn-' + mentorInformationId).replaceWith(renderHtmlSaveFavouriteButton(mentorInformationId));
                clickDesibledButton()
            }
        },
        error: function (error) {
            $(".loader").removeClass("loading")
        }
    });
}

(function ($) {
    $(() => {
        $('.btn-white-green').on('click', (event) => {
            event.stopImmediatePropagation();
            event.preventDefault();
        });
    });
})(jQuery);

function clickDesibledButton() {
    (function ($) {
        $(() => {
            $('.btn-white-green').on('click', (event) => {
                event.stopImmediatePropagation();
                event.preventDefault();
            });
        });
    })(jQuery);
}


$(".result-star-rating").rating({
    showClear: false,
    showCaption: false,
    size: 'xs',
    mouseEnabled: false,
    displayOnly: true
});

$(".star-rating").rating({
    showClear: false,
    size: 'md',
    clearCaption: 0,
    defaultCaption: '',
    starCaptions: function (val) {
        return val;
    },
    starTitles: false,
    showCaptionAsTitle: false,
    starCaptionClasses: function (val) {
        if (val === 0) {
            return 'caption-badge caption-secondary';
        } else if (val < 3) {
            return 'caption-badge caption-danger';
        } else {
            return 'caption-badge caption-success';
        }
    }
});


function openAddReviewPopup() {
    $('#addReviewPopup').modal('show');
}

function openAnswerReviewPopup(reviewId) {
    $('#answerReviewPopup').modal('show');
    $('#review-id').val(reviewId)
}

function openUpdateReviewPopup(reviewId) {
    $('#updateReviewPopup').modal('show');
    $('#update-review-id').val(reviewId)

    $('#update-star-text').val($('#review-item-' + reviewId).find('.review-text').text())
    $('#update-star-rating').val($('#review-item-' + reviewId).find('.result-star-rating').val())
}

function openUpdateParentReviewPopup(reviewId) {
    $('#updateParentReviewPopup').modal('show');
    $('#update-parent-review-id').val(reviewId)

    $('#update-parent-star-text').val($('#review-item-parent-' + reviewId).find('.review-text').text())
    $('#update-parent-star-rating').val($('#review-item-parent-' + reviewId).find('.result-star-rating').val())
}

