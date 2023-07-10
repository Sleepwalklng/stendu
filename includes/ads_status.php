<?php

if($_REQUEST['deal']==69){
?>
<div class="announcement-stages">
    <div class="announcement-stages__banner">
        <div class="announcement-stages__banner-corner corner-left"></div>
        <div class="announcement-stages__banner-corner corner-right"></div>
        <div class="announcement-stages__banner-img">
            <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stages-banner.svg" alt="">
        </div>
    </div>
    <div class="announcement-stages__content">
        <div class="announcement-stages__items">
            <div class="announcement-stages__item active">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-1.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Категория</div>
            </div>
            <div class="announcement-stages__item name-status">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-3.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Название</div>
            </div>
            <div class="announcement-stages__item price-status">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-3.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Цена</div>
            </div>

            <div class="announcement-stages__item contacts-status">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-5.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Контакты</div>
            </div>
        </div>
        <a href="/pomoshch/" class="announcement-stages__link">
            <div class="announcement-stages__link-suptitle">Столкнулись с проблемой?</div>
            <div class="announcement-stages__link-title">Задайте нам вопрос</div>
        </a>
    </div>
</div>
<script>
    $(document).ready(function () {
        if ($('textarea[name=UF_TITLE]').val()) {
            $('.name-status').addClass('active')
        }
        if ($('input[name=UF_PRICE_OT]').val() ||$('input[name=UF_PRICE_DO]').val()) {
            $('.price-status').addClass('active')
        }
        if ($('input[name=UF_OWNER_PHONE]').val()) {
            $('.contacts-status').addClass('active')
        }
        $('textarea[name=UF_TITLE]').on('change', function () {
            $('.name-status').addClass('active')
            if (!$(this).val()) {
                $('.name-status').removeClass('active')
            }
        })
        $('input[name=UF_PRICE_OT]').on('change', function () {
            $('.price-status').addClass('active')
            if (!$(this).val()&&!$('input[name=UF_PRICE_DO]').val()) {
                $('.price-status').removeClass('active')
            }
        })
        $('input[name=UF_PRICE_DO]').on('change', function () {
            $('.price-status').addClass('active')
            if (!$(this).val()&&!$('input[name=UF_PRICE_OT]').val()) {
                $('.price-status').removeClass('active')
            }
        })
        $('input[name=UF_OWNER_PHONE]').on('change', function () {
            $('.contacts-status').addClass('active')
            if (!$(this).val()) {
                $('.contacts-status').removeClass('active')
            }
        })


        $('input[name=UF_COM_SQUARE]').on('change', function () {
            $('.square-status').addClass('active')
            if (!$(this).val()) {
                $('.square-status').removeClass('active')
            }
        })
        $('input[name=UF_PLOT_SQUARE]').on('change', function () {
            $('.square-status').addClass('active')
            if (!$(this).val()) {
                $('.square-status').removeClass('active')
            }
        })


    })
</script>
<?php }else{?>
<div class="announcement-stages">
    <div class="announcement-stages__banner">
        <div class="announcement-stages__banner-corner corner-left"></div>
        <div class="announcement-stages__banner-corner corner-right"></div>
        <div class="announcement-stages__banner-img">
            <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stages-banner.svg" alt="">
        </div>
    </div>
    <div class="announcement-stages__content">
        <div class="announcement-stages__items">
            <div class="announcement-stages__item active">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-1.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Категория</div>
            </div>
            <div class="announcement-stages__item address-status">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-4.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Место сделки</div>
            </div>
            <div class="announcement-stages__item obj-status">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-2.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Об объекте</div>
            </div>
            <div class="announcement-stages__item square-status">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-3.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Площадь</div>
            </div>
            <div class="announcement-stages__item name-status">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-3.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Название</div>
            </div>
            <div class="announcement-stages__item price-status">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-3.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Цена</div>
            </div>

            <div class="announcement-stages__item contacts-status">
                <div class="announcement-stages__item-img">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-5.svg" alt="">
                </div>
                <div class="announcement-stages__item-name">Контакты</div>
            </div>
        </div>
        <a href="/pomoshch/" class="announcement-stages__link">
            <div class="announcement-stages__link-suptitle">Столкнулись с проблемой?</div>
            <div class="announcement-stages__link-title">Задайте нам вопрос</div>
        </a>
    </div>
</div>
<script>
    $(document).ready(function () {
        if ($('input[name=UF_ADDRESS]').val()) {
            $('.address-status').addClass('active')
        }
        if ($('input[name=UF_FLOOR_LEVEL_MAX]').val()) {
            $('.obj-status').addClass('active')
        }
        if ($('input[name=UF_TOTAL_AREA]').val()) {
            $('.square-status').addClass('active')
        }
        if ($('textarea[name=UF_TITLE]').val()) {
            $('.name-status').addClass('active')
        }
        if ($('input[name=UF_PRICE]').val()) {
            $('.price-status').addClass('active')
        }
        if ($('input[name=UF_OWNER_PHONE]').val()) {
            $('.contacts-status').addClass('active')
        }

        $('input[name=UF_ADDRESS]').on('change', function () {
            $('.address-status').addClass('active')
            if (!$(this).val()) {
                $('.address-status').removeClass('active')
            }
        })
        $('input[name=UF_FLOOR_LEVEL_MAX]').on('change', function () {
            $('.obj-status').addClass('active')
            if (!$(this).val()) {
                $('.obj-status').removeClass('active')
            }
        })
        $('input[name=UF_TOTAL_AREA]').on('change', function () {
            $('.square-status').addClass('active')
            if (!$(this).val()) {
                $('.square-status').removeClass('active')
            }
        })
        $('textarea[name=UF_TITLE]').on('change', function () {
            $('.name-status').addClass('active')
            if (!$(this).val()) {
                $('.name-status').removeClass('active')
            }
        })
        $('input[name=UF_PRICE]').on('change', function () {
            $('.price-status').addClass('active')
            if (!$(this).val()) {
                $('.price-status').removeClass('active')
            }
        })
        $('input[name=UF_OWNER_PHONE]').on('change', function () {
            $('.contacts-status').addClass('active')
            if (!$(this).val()) {
                $('.contacts-status').removeClass('active')
            }
        })


        $('input[name=UF_COM_SQUARE]').on('change', function () {
            $('.square-status').addClass('active')
            if (!$(this).val()) {
                $('.square-status').removeClass('active')
            }
        })
        $('input[name=UF_PLOT_SQUARE]').on('change', function () {
            $('.square-status').addClass('active')
            if (!$(this).val()) {
                $('.square-status').removeClass('active')
            }
        })


    })
</script>
<?php }?>

