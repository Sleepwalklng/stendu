<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
use lib\GetUserData;



// Получение типов услуг
const MY_HL_BLOCK_ID_TYPES_USLUG = 7;

$entity_data_class_type_uslugi = GetEntityDataClass(MY_HL_BLOCK_ID_TYPES_USLUG);
$rsData = $entity_data_class_type_uslugi::getList(array());
while ($el = $rsData->fetch()) {
    if ($_POST['categoria'] == $el['UF_NAME']){
        $categoria = $el['ID'];
    }elseif (!empty($_POST['categoryId'])){
        $categoria = $el['ID'];
    }

    $arTypes[] = $el;
}

// Получение услуг
const MY_HL_BLOCK_ID_USLUGIS = 1;
$entity_data_class_uslugi = GetEntityDataClass(MY_HL_BLOCK_ID_USLUGIS);
$list_array = array("select" => array("*"), "order" => array("ID" => "ASC"));

if (!empty($_POST['selectPrice']) || !empty($_POST['selectDate'])) {
    if (empty($_POST['selectDate'])) {
        $list_array['order'] = array("UF_PRICE" => $_POST['selectPrice']);
    } elseif (empty($_POST['selectPrice'])) {
        $list_array['order'] = array("UF_DATA" => $_POST['selectDate']);
    } else {
        $list_array['order'] = array("UF_PRICE" => $_POST['selectPrice'], "UF_DATA" => $_POST['selectDate']);
    }
}
$list_array['filter']['UF_STATUS'] = 29;
if ($categoria) {
    $list_array['filter']['UF_TYPE_USLUGI'] = $categoria;
}
if (!empty($_POST['priceDO'])) {
    $list_array['filter']['<=UF_PRICE'] = $_POST['priceDO'];
}
if (!empty($_POST['address'])) {
    $list_array['filter']['UF_ADRES'] = $_POST['address'];
}
if (!empty($_POST['priceOT'])) {
    $list_array['filter']['>=UF_PRICE'] = $_POST['priceOT'];
}
if (!empty($_POST['apartment'])) {
    $list_array['filter']['UF_SELLER'] = $_POST['apartment'];
}


$rsUslugi = $entity_data_class_uslugi::getList($list_array);
while ($usl = $rsUslugi->fetch()) {
    $usl['UF_PRICE'] = format_price($usl['UF_PRICE']);
    $arUslugi[] = $usl;
};

// избранное
if ($USER->IsAuthorized()) {

    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $arElements = $arUser['UF_FAVOR'];

    foreach ($arElements as $item) {
        $el = explode("-", $item);
        if ($el['0'] == '4') { $resultFav[] = $el['1']; }
    }
}
?>


<ul class="announcements__items">
    <? foreach ($arUslugi as $arItem): ?>
        <? foreach ($arTypes as $arType): ?>
            <? if ($arItem['UF_TYPE_USLUGI'] == $arType['ID']):
                $url = $arType['UF_SESSION_CODE'];
            endif; ?>
        <? endforeach ?>

        <? if (!empty($arItem['UF_NAME'])): ?>
            <li class="announcements__item cart <? if (in_array($arItem['ID'], $resultFav)) { echo 'cart--favorite'; } ?>">
                <a href="/uslugi/<?=$url?>/<?= $arItem['UF_SESSION_CODE'] ?>/">
                    <div class="cart__top">
                        <div class="cart__inner">
                            <ul class="cart__list swiper-wrapper">
                                <? if (!empty($arItem['UF_PHOTO'])): ?>
                                    <? foreach ($arItem['UF_PHOTO'] as $photo): ?>
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
                        </div>
                    </div>

                    <div class="cart__line"></div>

                    <div class="cart__bottom">
                        <div class="cart__wrapper">
                            <div class="cart__left">
                                <div class="cart__subtitle">
                                    <?= $arItem['UF_NAME'] ?? ''; ?>
                                </div>

                                <div class="cart__cost">
                                    <?= $arItem['UF_PRICE'] ?? '' ?>
                                </div>
                            </div>

                            <div class="cart__right">
                                <div class="cart__location">
                                    <img class="cart__location-img"
                                         src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg"
                                         alt="местоположение">

                                    <?= $arItem['UF_ADRES'] ?? '' ?>
                                </div>

                                <div class="cart__date">
                                    <?
                                    if ($stmp = MakeTimeStamp($arItem['UF_DATA'], "DD.MM.YYYY HH:MI:SS")) {
                                        echo FormatDate("j F Y H:i", $stmp);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>


                        <div class="cart__info">
                            <div class="cart__text">
                                <?= $arItem['UF_COMMENT'] ?? '' ?>
                            </div>

                            <a class="cart__message btn-blue" href="#">
                                <img class="cart__message-img"
                                     src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                     alt="Написать">

                                Написать
                            </a>

                            <a class="cart__favorite" data-item="<?= $arItem['ID'] ?>" data-razdel="5">
                                <img class="cart__favorite-img"
                                     src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg"
                                     alt="добавить в избранное">
                                <img class="cart__favorite-img cart__favorite-img--active"
                                     src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                                     alt="добавить в избранное">
                            </a>
                        </div>
                    </div>
                    <? $user = GetUserData::getUser((int)$arItem['UF_USER_ID']); ?>
                    <div class="cart__author">
                        <div class="cart__name">
                            <?= $user['NAME'] ?>
                        </div>

                        <div class="cart__reg-date">
                            На Stendū с 12 ноября 2021
                        </div>

                        <div class="cart__tel">
                            <img class="cart__tel-img" src="<?= SITE_TEMPLATE_PATH ?>/images/phone.svg"
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
        <? endif; ?>
    <? endforeach; ?>
</ul>

    