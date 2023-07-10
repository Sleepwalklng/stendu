if ($(`select`)) {
    $(`select`).niceSelect()
}

//Добавление фото в создание заказа
class AddPortfolio {
    constructor(selector, options) {
        this.$element = document.querySelector('.announcement-content__appearance-photos-wrap');
        this.setUp();
    }

    setUp() {
        if (this.$element) {
            this.$fileSelectDt = new DataTransfer();
            this.$file = this.$element.querySelector('.announcement-content__appearance-photo-input');
            this.$list = this.$element.querySelector('.announcement-content__appearance-photos');
            this.fileHendler();
            this.removeHendler();
        }
    }

    fileHendler() {
        this.$file.addEventListener('change', () => {
            if (this.$file.files.length > 0) {
                for (var key in this.$file.files) {
                    this.$fileSelectDt.items.add(this.$file.files[key])

                    let path = this.imgPath = window.URL.createObjectURL(this.$file.files[key]);
                    this.addItem(path);
                }

            }
        })
    }

    removeHendler() {
        this.$list.addEventListener('click', (e) => {
            if (e.target.dataset.appearancephotoremove) {
                this.removeArrItem(e.target.parentNode);
                this.removeItem(e.target.dataset.appearancephotoremove);

            }
        })
    }

    removeItem(id) {
        document.querySelector(`.announcement-content__appearance-photo[data-appearance-photo="${id}"]`).remove();

    }

    removeArrItem(el) {
        let dt = new DataTransfer()
        const index = Array.prototype.indexOf.call(el.parentNode.children, el);

        // Copy all besides deleted
        for (let i = 0; i <= this.$fileSelectDt.files.length - 1; i++)
            if (i !== index)
                dt.items.add(this.$fileSelectDt.files[i])

        // Replace
        this.$fileSelectDt = dt
        this.$file.files = this.$fileSelectDt.files

    }

    addItem(path) {
        let items = document.querySelectorAll('.announcement-content__appearance-photo');
        let id = items.length > 0 ? items[items.length - 1].getAttribute('data-appearance-photo') : 0;
        this.$list.insertAdjacentHTML('beforeend', this.getTemplate(path, +id + 1));
        document.getElementById('load-modal__photo').src = path;

    }

    getTemplate(path, id) {
        return `
        <div class="announcement-content__appearance-photo" data-appearance-photo="${id}">
          <div class="announcement-content__appearance-photo-img">
            <img src="${path}" alt="">
          </div>
          <div class="announcement-content__appearance-photo-remove" data-appearancePhotoRemove="${id}">
            <img src="/local/templates/stendu/images/announcement/appearance-photo-delete.svg" alt="">
          </div>
        </div>
      `;
    }
}

const addPOrtfolio = new AddPortfolio();
// Отправление форм
$(document).ready(function () {
    $('input').on('keydown', function () {
        $(this).removeClass('invalid');
        $(this).parent().find('span.error_message').remove();
    });

    $('.announcement-content__video').on('click','span', function (){
        $('.posting-videos-popup').css('display','block');
    })
    $('.visually-hidden').each(function () {
        if($(this).prop("checked", false)){
            $(this).val('off')
        }else{
            $(this).val('on')
        }

    });
    $('.label-checkbox').on('change','.visually-hidden', function (){
       if($(this).val() == 'on'){
           $(this).val('off')
       }else{
           $(this).val('on')
       }
    })
    $('form').keydown(function (e) {
        if (e.keyCode === 13) {
            e.preventDefault()
        }
    });
    $('.add-new-item_form').on('submit', function (e) {
        e.preventDefault()
        if (window.FormData === undefined) {
            alert('В вашем браузере FormData не поддерживается')
        } else {
            var formData = new FormData();
            $(this).find(':input[name]').not('[type="file"]').each(function () {
                var field = $(this);
                formData.append(field.attr('name'), field.val());
            });
            $(this).find('select').each(function () {
                var field = $(this);
                formData.append(field.attr('name'), field.val());
            });
            $.each($("#upload-file")[0].files, function (key, input) {
                formData.append('file[]', input);
            });
            $('.announcement-content__appearance-photo').each(function ()  {
                formData.append('files[]', $(this).attr('data-id'));
            });
            formData.append('UF_REGION', $('.region').val());
            formData.append('UF_SELLERS', $('.agent').val());
            formData.append('UF_DEAL_TYPE', $('.deal').val());
            formData.append('UF_TYPE', $('.type').val());
            formData.append('UF_TYPE_OF_RS', $('.type_of_rs').val());
            formData.append('UF_GEO', $('#geo').val());
            formData.append('UF_STATUS', 86);
            formData.append('oper', $('.oper').val());
            formData.append('id', $('.id_property').val());
            $.ajax({
                type: 'post',
                contentType: false,
                processData: false,
                url: '/ajax/additem/nedvizhimost.php',
                data: formData,
                dataType: 'html',
                success: function (e) {
                    console.log(e)
                    e = JSON.parse(e)
                    if (e.res == 'success') {
                        $('.announcement-modal').css('display', 'block');
                        $('.announcement-modal__close').click(function () {
                            window.location = '/profile';
                            $('.announcement-modal').css('display', 'none');
                        })
                    } else {
                        $.each(e, function (index, value) {
                            $('textarea[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                            $('input[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                            $('select[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                        });
                        $('html, body').animate({
                            scrollTop: $('input[name=' + Object.keys(e)[0] + ']').offset().top // класс объекта к которому приезжаем
                        }, 1000);
                    }

                },
                error: function (data) {
                    console.log(data);
                    console.log(false);
                }
            });
        }

    })





    $('.announcement-save__btn').on('click', function (e) {
        e.preventDefault()
        if (window.FormData === undefined) {
            alert('В вашем браузере FormData не поддерживается')
        } else {
            var formData = new FormData();
            $('.add-new-item_form').find(':input[name]').not('[type="file"]').each(function () {
                var field = $(this);
                formData.append(field.attr('name'), field.val());
            });
            $('.add-new-item_form').find('select').each(function () {
                var field = $(this);
                formData.append(field.attr('name'), field.val());
            });
            $.each($("#upload-file")[0].files, function (key, input) {
                formData.append('file[]', input);
            });
            $('.announcement-content__appearance-photo').each(function ()  {
                formData.append('files[]', $(this).attr('data-id'));
            });
            formData.append('UF_REGION', $('.region').val());
            formData.append('UF_SELLERS', $('.agent').val());
            formData.append('UF_DEAL_TYPE', $('.deal').val());
            formData.append('UF_TYPE', $('.type').val());
            formData.append('UF_TYPE_OF_RS', $('.type_of_rs').val());
            formData.append('UF_GEO', $('#geo').val());
            formData.append('UF_STATUS', 88);
            formData.append('oper', $('.oper').val());
            formData.append('id', $('.id_property').val());
            $.ajax({
                type: 'post',
                contentType: false,
                processData: false,
                url: '/ajax/additem/nedvizhimost.php',
                data: formData,
                dataType: 'html',
                success: function (e) {
                    e = JSON.parse(e)
                    if (e.res == 'success') {
                        window.location = '/profile';
                    } else {
                        $.each(e, function (index, value) {
                            $('textarea[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                            $('input[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                            $('select[name=' + index + ']').addClass('invalid').parent().append('<span class="error_message">' + value + '</span>')
                        });
                        $('html, body').animate({
                            scrollTop: $('input[name=' + Object.keys(e)[0] + ']').offset().top // класс объекта к которому приезжаем
                        }, 1000);
                    }

                },
                error: function (data) {
                    console.log(data);
                    console.log(false);
                }
            });
        }

    })
});

