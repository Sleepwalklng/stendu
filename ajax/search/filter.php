<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

CModule::IncludeModule('highloadblock');

use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\UserField\DictionaryField;
use Bitrix\Main\UserField\Types\DateTimeType;

use lib\GetUserData;

global $USER;
$ID_user = $USER->GetID();

function GetEntityDataClass1($HlBlockId)
{
    if (empty($HlBlockId) || $HlBlockId < 1) {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}

$searchQuery = "%{$_REQUEST['SEARCH']}%";


$entity_data_class_transport = GetEntityDataClass1(3);

$entity_data_class_job = GetEntityDataClass1(11);

$entity_data_class_services = GetEntityDataClass1(1);

$entity_data_class_houses = GetEntityDataClass1(2);

$entity_data_class_clothes = GetEntityDataClass1(13);

$array_all = [];
$i = 0;
$rsData = $entity_data_class_transport::getList(array(
    'select' => array('*'),
    'filter' => array(
        'UF_TRANSPORT_NAME' => $searchQuery
    )
));

while ($arItem = $rsData->fetch()) {
    if ($stmp = MakeTimeStamp($arItem['UF_TRANSPORT_CREATED_DATE'], "DD.MM.YYYY")) {
        $stmp2 = FormatDate("j F Y", $stmp);
        $stmp1 = FormatDate("Y-m-d", $stmp);
    }

    $entity_data_class_type_tr = GetEntityDataClass1(6);
    $rstype = $entity_data_class_type_tr::getList(array());
    while ($el = $rstype->fetch()) {
        $arTypes[] = $el;
    }
    foreach ($arTypes as $arType):
        if ($arItem['UF_TRANSPORT_MARK'] == $arType['ID']):
            $url = $arType['UF_TRANSPORT_MARK_CODE'];
        endif;
    endforeach ;
    $array_all[$i]["DATA-FILTER"] = $stmp1;
    $array_all[$i]["URL"] = "/transport/".$url."/".$arItem['UF_TRANSPORT_CODE']."/";
    $array_all[$i]["DATA"] = $stmp2;
    $array_all[$i]["ID"] = $arItem['ID'];
    $array_all[$i]["RAZDEL"] = 1;
    $array_all[$i]["TYPE"] = 'TRANSPORT';
    $array_all[$i]["PRICE"] = $arItem['UF_TRANSPORT_PRICE'];
    $array_all[$i]["ADDRESS"] = $arItem['UF_TRANSPORT_ADDRESS'];
    $array_all[$i]["PHOTO"] = $arItem['UF_TRANSPORT_IMAGES'];
    $array_all[$i]["NAME"] = $arItem['UF_TRANSPORT_NAME'];
    $array_all[$i]["TEXT"] = $arItem['UF_TRANSPORT_DESC'];
    $array_all[$i]["USER_ID"] = $arItem['UF_TRANSPORT_USER_ID'];

    $i++;
}


$rsData = $entity_data_class_job::getList(array(
    'select' => array('*'),
    'filter' => array(
        'UF_NAME' => $searchQuery
    )
));

while ($arItem = $rsData->fetch()) {
    if ($stmp = MakeTimeStamp($arItem['UF_DATA'], "DD.MM.YYYY")) {
        $stmp2 = FormatDate("j F Y", $stmp);
        $stmp1 = FormatDate("Y-m-d", $stmp);
    }

    $array_all[$i]["DATA-FILTER"] = $stmp1;
    $array_all[$i]["DATA"] = $stmp2;
    $array_all[$i]["URL"] = "/rabota/". $arItem['UF_SESSION_CODE']."/";
    $array_all[$i]["ID"] = $arItem['ID'];
    $array_all[$i]["RAZDEL"] = 3;
    $array_all[$i]["TYPE"] = 'JOB';
    $array_all[$i]["PRICE"] = $arItem['UF_PRICE'];
    $array_all[$i]["ADDRESS"] = $arItem['UF_ADRES'];
    $array_all[$i]["PHOTO"] = $arItem['UF_PHOTO'];
    $array_all[$i]["NAME"] = $arItem['UF_NAME'];
    $array_all[$i]["TEXT"] = $arItem['UF_COMMENT'];
    $array_all[$i]["USER_ID"] = $arItem['UF_USER_ID'];
    $i++;
}


$rsData = $entity_data_class_services::getList(array(
    'select' => array('*'),
    'filter' => array(
        'UF_NAME' => $searchQuery
    )
));

while ($arItem = $rsData->fetch()) {
    // Обработка найденных элементов
    if ($stmp = MakeTimeStamp($arItem['UF_DATA'], "DD.MM.YYYY")) {
        $stmp2 = FormatDate("j F Y", $stmp);
        $stmp1 = FormatDate("Y-m-d", $stmp);
    }

    $entity_data_class_type_uslugi = GetEntityDataClass1(7);
    $rstype = $entity_data_class_type_uslugi::getList(array());
    while ($el = $rstype->fetch()) {
        $arTypes[] = $el;
    }
    foreach ($arTypes as $arType):
        if ($arItem['UF_TYPE_USLUGI'] == $arType['ID']):
            $url = $arType['UF_SESSION_CODE'];
        endif;
    endforeach ;

    $array_all[$i]["DATA"] = $stmp2;
    $array_all[$i]["DATA-FILTER"] = $stmp1;
    $array_all[$i]["URL"] = "/uslugi/".$url."/".$arItem['UF_SESSION_CODE']."/";
    $array_all[$i]["ID"] = $arItem['ID'];
    $array_all[$i]["TYPE"] = 'SERVICE';
    $array_all[$i]["PRICE"] = $arItem['UF_PRICE'];
    $array_all[$i]["ADDRESS"] = $arItem['UF_ADRES'];
    $array_all[$i]["RAZDEL"] = 4;
    $array_all[$i]["NAME"] = $arItem['UF_NAME'];
    $array_all[$i]["PHOTO"] = $arItem['UF_PHOTO'];
    $array_all[$i]["TEXT"] = $arItem['UF_COMMENT'];
    $array_all[$i]["USER_ID"] = $arItem['UF_USER_ID'];
    $i++;
}

$rsData = $entity_data_class_houses::getList(array(
    'select' => array('*'),
    'filter' => array(
        'UF_NAME' => $searchQuery
    )
));

while ($arItem = $rsData->fetch()) {
    // Обработка найденных элементов
    if ($stmp = MakeTimeStamp($arItem['UF_DATA'], "DD.MM.YYYY")) {
        $stmp2 = FormatDate("j F Y", $stmp);
        $stmp1 = FormatDate("Y-m-d", $stmp);
    }

    if ($arItem['UF_DEAL_TYPE'] == 67)
        $url = 'snyat';
    elseif ($arItem['UF_DEAL_TYPE'] == 68)
        $url = 'posutochno';
    elseif ($arItem['UF_DEAL_TYPE'] == 66)
        $url = 'kupit';
    elseif ($arItem['UF_DEAL_TYPE'] == 69)
        $url = 'zapros-na-nedvizhimost';

    $array_all[$i]["DATA-FILTER"] = $stmp1;
    $array_all[$i]["RAZDEL"] = 2;
    $array_all[$i]["DATA"] = $stmp2;
    $array_all[$i]["ID"] = $arItem['ID'];
    $array_all[$i]["TYPE"] = 'HOUSES';
    $array_all[$i]["PRICE"] = $arItem['UF_PRICE'];
    $array_all[$i]["ADDRESS"] = $arItem['UF_ADDRESS'];
    $array_all[$i]["URL"] = "/nedvizhimost/" . $url . "/" . $arItem['UF_SESSION_CODE'] . "/";
    $array_all[$i]["NAME"] = $arItem['UF_NAME'];
    $array_all[$i]["TEXT"] = $arItem['UF_DESCRIPTION'];
    $array_all[$i]["USER_ID"] = $arItem['UF_USER_ID'];
    $array_all[$i]["PHOTO"] = $arItem['UF_PHOTOS'];
    $i++;
}


$rsData = $entity_data_class_clothes::getList(array(
    'select' => array('*'),
    'filter' => array(
        'UF_NAME' => $searchQuery
    )
));

while ($arItem = $rsData->fetch()) {
    // Обработка найденных элементов
    if ($stmp = MakeTimeStamp($arItem['UF_DATA'], "DD.MM.YYYY")) {
        $stmp2 = FormatDate("j F Y", $stmp);
        $stmp1 = FormatDate("Y-m-d", $stmp);
    }
    $array_all[$i]["URL"] = "/lichnye-veshchi/". $arItem['UF_SESSION_CODE']."/";
    $array_all[$i]["DATA-FILTER"] = $stmp1;
    $array_all[$i]["DATA"] = $stmp2;
    $array_all[$i]["ID"] = $arItem['ID'];
    $array_all[$i]["TYPE"] = 'CLOTHING';
    $array_all[$i]["PRICE"] = $arItem['UF_PRICE'];
    $array_all[$i]["ADDRESS"] = $arItem['UF_ADDRESS'];
    $array_all[$i]["RAZDEL"] = 5;
    $array_all[$i]["PHOTO"] = $arItem['UF_PHOTOS'];
    $array_all[$i]["NAME"] = $arItem['UF_NAME'];
    $array_all[$i]["TEXT"] = $arItem['UF_DESCRIPTION'];
    $array_all[$i]["USER_ID"] = $arItem['UF_USER_ID'];
    $i++;
}
if ($USER->IsAuthorized()) {

    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $arElements = $arUser['UF_FAVOR'];
    foreach ($arElements as $item) {
//        echo $item;
        $resultFav[] = $item;

    }
}


//echo '<pre>';
//print_r($array_all);
//echo '</pre>';
$dates = array_column($array_all, 'DATA-FILTER');

// Сортируем массивы в соответствии с датами
if ($_REQUEST['DATA_SORT'] == 'DESC') {
    array_multisort($dates, SORT_DESC, $array_all);
}elseif ($_REQUEST['DATA_SORT'] == 'ASC'){
    array_multisort($dates, SORT_ASC, $array_all);
}elseif($_REQUEST['DATA_SORT'] == 'all'){
    shuffle($array_all);
}

$prices = array_column($array_all, 'PRICE');
if ($_REQUEST['PRICE_SORT'] == 'DESC') {
    array_multisort($prices, SORT_DESC, $array_all);
}elseif ($_REQUEST['PRICE_SORT'] == 'ASC'){
    array_multisort($prices, SORT_ASC, $array_all);

}elseif($_REQUEST['PRICE_SORT'] == 'all' && $_REQUEST['DATA_SORT'] == 'all'){
    shuffle($array_all);
}
//
//echo $_REQUEST['DATA_SORT'].'<br>';
//echo '<pre>';
//print_r($array_all);
//echo '</pre>';
$prices_array = explode(';',$_REQUEST['my_range']);
?>
<ul class="announcements__items">
    <?php
    foreach ($array_all AS $value):
        if (isset($_REQUEST['my_range'])) {
            if ($prices_array[0] > $value['PRICE'] || $prices_array[1] < $value['PRICE']) {
                continue;
            }
        } else {
            if (empty($_REQUEST['PRICE_OT'])){$_REQUEST['PRICE_OT'] = 0;}
            if (empty($_REQUEST['PRICE_DO'])){$_REQUEST['PRICE_DO'] = 10000000000;}
            if ($_REQUEST['PRICE_OT'] > $value['PRICE'] || $_REQUEST['PRICE_DO'] < $value['PRICE']) {
                continue;
            }
        }
            ?>
        <li class="announcements__item cart  <? if (in_array($value['RAZDEL']."-".$value['ID'], $resultFav)) {
            echo 'cart--favorite';
        } ?>">
            <a href="<?=$value['URL']?>">
                <div class="cart__top">
                    <div class="cart__inner swiper">
                        <ul class="cart__list swiper-wrapper">

                            <? if (!empty($value['PHOTO'])): ?>
                                <? foreach ($value['PHOTO'] as $photo): ?>
                                    <li class="cart__box swiper-slide">
                                        <img class="cart__img"
                                             src="<?= CFile::GetPath($photo) ?>"
                                             alt="">
                                    </li>
                                <? endforeach; ?>
                            <? else: ?>
                                <li class="cart__box swiper-slide">
                                    <img class="cart__img"
                                         src="<?= SITE_TEMPLATE_PATH ?>/images/zaglushka_foto.svg"
                                         alt="">
                                </li>
                            <? endif; ?>
                        </ul>

                        <div class="cart__pagination"></div>
                    </div>
                </div>

                <div class="cart__line"></div>

                <div class="cart__bottom">
                    <div class="cart__wrapper">
                        <div class="cart__left">
                            <div class="cart__subtitle"><?=$value['NAME']?></div>

                            <div class="cart__cost"><?=$value['PRICE']?></div>
                        </div>

                        <div class="cart__right">
                            <div class="cart__location">
                                <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg"
                                     alt="местоположение">
                                <?=$value['ADDRESS']?>
                            </div>
                            <div class="cart__date">
                                <?=$value['DATA']?>
                            </div>
                        </div>
                    </div>


                    <div class="cart__info">
                        <div class="cart__text"><?=$value['TEXT']?></div>

                        <a class="cart__message btn-blue" href="#">
                            <img class="cart__message-img"
                                 src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                 alt="Написать">

                            Написать
                        </a>

                        <a class="cart__favorite" data-item="<?= $value['ID'] ?>"
                           data-razdel="<?=$value['RAZDEL']?>">
                            <img class="cart__favorite-img"
                                 src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg"
                                 alt="добавить в избранное">
                            <img class="cart__favorite-img cart__favorite-img--active"
                                 src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                                 alt="добавить в избранное">
                        </a>
                    </div>
                </div>

                <? $user = GetUserData::getUser((int)$value['USER_ID']); ?>
                <div class="cart__author">
                    <div class="cart__name">
                        <?= $user['NAME'] ?>
                    </div>

                    <div class="cart__reg-date">
                        На Stendū с 12 ноября 2021
                    </div>

                    <div class="cart__tel">
                        <img class="cart__tel-img"
                             src="<?= SITE_TEMPLATE_PATH ?>/images/phone.svg"
                             alt="Позвонить">

                        <div class="cart__tel-wrapper">
                            <a class="cart__tel-show" href="#">
                                Показать телефон
                            </a>

                            <a class="cart__num" href="#">
                                <?= $user['PERSONAL_PHONE'] ?>
                            </a>
                        </div>
                    </div>

                    <a class="cart__message btn-blue" href="#">
                        <img class="cart__message-img"
                             src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                             alt="Написать">

                        Написать
                    </a>
                </div>
            </a>
        </li>
    <?endforeach;?>
</ul>

<script>
    $(document).ready(function () {
        $('.cart__favorite').on('click', function (e) { ///Подправил, чтобы после ajax работало
            var favorID = $(this).attr('data-item');
            var favorRazdel = $(this).attr('data-razdel');
            if ($(this).hasClass('active')) {
                var doAction = 'delete';
            } else {
                var doAction = 'add';
            }
            addFavorite(favorID, doAction, favorRazdel);
        });

        function addFavorite(id, action, razdel) {
            var param = 'id=' + id + "&action=" + action + "&razdel=" + razdel;
            $.ajax({
                url: '/ajax/favorites.php', // URL отправки запроса
                type: "GET",
                dataType: "html",
                data: param,
                success: function (response) { // Если Данные отправлены успешно
                    var result = $.parseJSON(response);
                    if (result == 1) { // Если всё чётко, то выполняем действия, которые показывают, что данные отправлены
                        $('.cart__favorite[data-item="' + id + '"]').addClass('active');
                    }
                    if (result == 2) {
                        $('.cart__favorite[data-item="' + id + '"]').removeClass('active');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) { // Ошибка
                    console.log('Error: ' + errorThrown);
                }
            });

        }


    });
</script>
