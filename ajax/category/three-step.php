<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

function show_non_empty($v1, $v2, $v3, $v4)
{
    $non_empty = array();
    if (!empty($v1)) {
        $non_empty[] = $v1;
    }
    if (!empty($v2)) {
        $non_empty[] = $v2;
    }
    if (!empty($v3)) {
        $non_empty[] = $v3;
    }
    if (!empty($v4)) {
        $non_empty[] = $v4;
    }

    return $non_empty;
}

$res1 = show_non_empty($_REQUEST['subcategory1'], $_REQUEST['subcategory2'], $_REQUEST['subcategory3'], $_REQUEST['subcategory4']);
$res2 = array_pop($res1);

?>


<div class="new-ad__category-content">
    <div class="new-ad__category-title-box">
        <h3 class="new-ad__item-title">Категория</h3>
        <button type="button" class="new-ad__category-reset-btn mobile">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 20H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z"
                      stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
    <div class="new-ad__category">
        <div class="new-ad__category-icon">
            <img src="<?= SITE_TEMPLATE_PATH ?>/img/category-icon1.svg" alt="">
        </div>
        <div class="new-ad__category-name-box">
            <h3 class="new-ad__category-title">
                <span><?= $_REQUEST['category'] ?></span>
                <? if ($_REQUEST['category'] == 'Работа' || $_REQUEST['category'] == 'Услуги') { ?>
                    <span><?= $_REQUEST['subcategory'] ?></span>
                <? } else { ?>
                    <? foreach ($res1 as $item) { ?>
                        <span><?= $item ?></span>
                    <? } ?>
                <? } ?>

            </h3>
            <p class="new-ad__category-sub-title">
                <span class="mobile"><?= $_REQUEST['category'] ?></span>
                <span><?= $res2 ?></span>
            </p>
        </div>
        <button type="button" class="new-ad__category-reset-btn desktop other-category">Другая категория</button>
    </div>
</div>


<? if ($_REQUEST['category'] == 'Личные вещи') {
    ?><!-- Личные вещи -------------------------------------------------------- -->
<input class="subcategory3SecondName" type="hidden" name="subcategory3SecondName"
       value="<?= $_REQUEST['subcategory3SecondName'] ?>">
<input class="subcategoryNum11" type="hidden" name="subcategoryNum11" value="<?= $_REQUEST['subcategoryNum11'] ?>">
<input class="subcategoryNum22" type="hidden" name="subcategoryNum22" value="<?= $_REQUEST['subcategoryNum22'] ?>">
<input class="subcategoryNum33" type="hidden" name="subcategoryNum33" value="<?= $_REQUEST['subcategoryNum33'] ?>">
<input class="subcategoryNum4" type="hidden" name="subcategoryNum4" value="<?= $_REQUEST['subcategoryNum4'] ?>">
<?php if (!empty($_REQUEST['id_item'])): ?>
    <input class="idItem" type="hidden" name="idItem" value="<?= $_REQUEST['id_item'] ?>">
    <input class="hl_id" type="hidden" name="hl_id" value="<?= $_REQUEST['hl_id'] ?>">
    <script>
        let data = []
        data.push({name: 'subcategory3SecondName', value: $('input[name=subcategory3SecondName]').val()})
        data.push({name: 'subcategoryNum11', value: $('input[name=subcategoryNum11]').val()})
        data.push({name: 'subcategoryNum22', value: $('input[name=subcategoryNum22]').val()})
        data.push({name: 'subcategoryNum33', value: $('input[name=subcategoryNum33]').val()})
        data.push({name: 'subcategoryNum4', value: $('input[name=subcategoryNum4]').val()})
        data.push({name: 'idItem', value: $('input[name=idItem]').val()})
        data.push({name: 'hl_id', value: $('input[name=hl_id]').val()})
        $.ajax({
            type: 'post',
            url: '/ajax/category/lichnye.php',
            data: data,
            dataType: 'html',
            success: function (e) {
                $('.main').empty().append('<section class="new_add"><div class="container"><h2 class="new-ad__title">Редактирование объявления "<?=$_REQUEST['name']?>"</h2>' +
                    '<div class="new-ad__content"><form class="new-ad__form"></form></div></div></section>');
                $('.new-ad__form').append(e);
            },
            error: function (e) {
                console.log(false);
            }
        });
    </script>
<?php else: ?>
    <script>
        let data = []
        data.push({name: 'subcategory3SecondName', value: $('input[name=subcategory3SecondName]').val()})
        data.push({name: 'subcategoryNum11', value: $('input[name=subcategoryNum11]').val()})
        data.push({name: 'subcategoryNum22', value: $('input[name=subcategoryNum22]').val()})
        data.push({name: 'subcategoryNum33', value: $('input[name=subcategoryNum33]').val()})
        data.push({name: 'subcategoryNum4', value: $('input[name=subcategoryNum4]').val()})
        $.ajax({
            type: 'post',
            url: '/ajax/category/lichnye.php',
            data: data,
            dataType: 'html',
            success: function (e) {
                $('.new-ad__form').append(e);
            },
            error: function (e) {
                console.log(false);
            }
        });
    </script>
<?php endif;?>
<? } elseif ($_REQUEST['category'] == 'Транспорт') { ?><!-- Транспорт -------------------------------------------------------- -->
    <script>
        $.ajax({
            type: 'post',
            url: '/ajax/category/transport.php',
            //data: data,
            dataType: 'html',
            success: function (e) {
                $('.new-ad__form').append(e);


            },
            error: function (e) {
                console.log(false);
            }
        });
    </script>
<? } elseif ($_REQUEST['category'] == 'Недвижимость') { ?><!-- Недвижимость -------------------------------------------------------- -->
    <script>
        $.ajax({
            type: 'post',
            url: '/ajax/category/nedvizhimost.php',
            //data: data,
            dataType: 'html',
            success: function (e) {
                $('.new-ad__form').append(e);


            },
            error: function (e) {
                console.log(false);
            }
        });
    </script>
<? } elseif ($_REQUEST['category'] == 'Услуги') { ?><!-- Услуги -------------------------------------------------------- -->
<input class="subcategoryServ" type="hidden" name="subcategoryServ" value="<?= $_REQUEST['subcategoryID'] ?>">
<?php if (!empty($_REQUEST['id_item'])): ?>
    <input class="idItem" type="hidden" name="idItem" value="<?= $_REQUEST['id_item'] ?>">
    <input class="hl_id" type="hidden" name="hl_id" value="<?= $_REQUEST['hl_id'] ?>">
    <script>
        let data = []
        data.push({name: 'subcategoryServ', value: $('input[name=subcategoryServ]').val()})
        data.push({name: 'idItem', value: $('input[name=idItem]').val()})
        data.push({name: 'hl_id', value: $('input[name=hl_id]').val()})
        $.ajax({
            type: 'post',
            url: '/ajax/category/uslugi.php',
            data: data,
            dataType: 'html',
            success: function (e) {
                $('.main').empty().append('<section class="new_add"><div class="container"><h2 class="new-ad__title">Редактирование объявления "<?=$_REQUEST['name']?>"</h2>' +
                    '<div class="new-ad__content"><form class="new-ad__form"></form></div></div></section>');
                $('.new-ad__form').append(e);
            },
            error: function (e) {
                console.log(false);
            }
        });
    </script>
<?php else: ?>
    <script>
        let data = []
        data.push({name: 'subcategoryServ', value: $('input[name=subcategoryServ]').val()})
        $.ajax({
            type: 'post',
            url: '/ajax/category/uslugi.php',
            data: data,
            dataType: 'html',
            success: function (e) {
                $('.new-ad__form').append(e);
            },
            error: function (e) {
                console.log(false);
            }
        });
    </script>
<?php endif; ?>
<? } elseif ($_REQUEST['category'] == 'Работа') { ?><!-- Работа -------------------------------------------------------- -->
<input class="subcategoryWork" type="hidden" name="subcategoryWork" value="<?= $_REQUEST['subcategoryID'] ?>">
<?php if (!empty($_REQUEST['id_item'])): ?>
    <input class="idItem" type="hidden" name="idItem" value="<?= $_REQUEST['id_item'] ?>">
    <input class="hl_id" type="hidden" name="hl_id" value="<?= $_REQUEST['hl_id'] ?>">
    <script>
        let data = []
        data.push({name: 'subcategoryWork', value: $('input[name=subcategoryWork]').val()})
        data.push({name: 'idItem', value: $('input[name=idItem]').val()})
        data.push({name: 'hl_id', value: $('input[name=hl_id]').val()})
        $.ajax({
            type: 'post',
            url: '/ajax/category/rabota.php',
            data: data,
            dataType: 'html',
            success: function (e) {
                $('.main').empty().append('<section class="new_add"><div class="container"><h2 class="new-ad__title">Редактирование объявления "<?=$_REQUEST['name']?>"</h2>' +
                    '<div class="new-ad__content"><form class="new-ad__form"></form></div></div></section>');
                $('.new-ad__form').append(e);
            },
            error: function (e) {
                console.log(false);
            }
        });
    </script>
<?php else: ?>
    <script>
        let data = []
        data.push({name: 'subcategoryWork', value: $('input[name=subcategoryWork]').val()})
        $.ajax({
            type: 'post',
            url: '/ajax/category/rabota.php',
            data: data,
            dataType: 'html',
            success: function (e) {
                $('.new-ad__form').append(e);


            },
            error: function (e) {
                console.log(false);
            }
        });
    </script>
<?php endif; ?>
<? } ?>

<script>
    // Другая категория
    $(document).ready(function () {
        $('.other-category').click(function () {
            var data = $(this).serialize();

            $.ajax({
                type: 'post',
                url: '/ajax/category/other.php',
                data: data,
                dataType: 'html',
                success: function (e) {
                    $('.update-block').remove();
                    $('.category-select').empty().append(e);

                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });


</script>