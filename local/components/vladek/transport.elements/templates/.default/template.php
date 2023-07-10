<?
use lib\GetUserData;

$items = $arResult['ITEMS'];

//print_r($items);
if ($USER->IsAuthorized()) {

    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $arElements = $arUser['UF_FAVOR'];

    foreach ($arElements as $item1) {
        $el = explode("-", $item1);
        if ($el['0'] == '1') {
            $resultFav[] = $el['1'];
        }
    }
}

$MY_HL_BLOCK_ID = 6;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
if (!empty($_REQUEST['SECTION_CODE'])){
    $rsData = $entity_data_class::getList(array(
        'select' => array('ID'),
        'order' => array('UF_TRANSPORT_MARK_NAME' => 'ASC'),
        'filter' => array('UF_TRANSPORT_MARK_CODE' => $_REQUEST['SECTION_CODE'])
    ));
}else{
    $rsData = $entity_data_class::getList(array(
        'select' => array('ID'),
        'order' => array('UF_TRANSPORT_MARK_NAME' => 'ASC'),
//        'filter' => array('UF_TRANSPORT_MARK_CODE' => $_REQUEST['SECTION_CODE'])
    ));
}

while($el = $rsData->fetch()){
    $resListModelID[] = $el['ID'];
}

use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
$MY_HL_BLOCK_ID = 3;
CModule::IncludeModule('highloadblock');

$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
$rsData = $entity_data_class::getList(array(
   'select' => array('*'),
   'filter' => array('UF_TRANSPORT_MARK' => $resListModelID)
));

while($el = $rsData->fetch()) {

    $mark[] = $el; 
}
?>




    <? foreach ($mark as $item):?>
        <li class="announcements__item cart <? if (in_array($item['ID'], $resultFav)) {
            echo 'cart--favorite';
        } ?>">
         <a href="/<?=LANGUAGE_ID?>/transport/<?=$item['UF_TRANSPORT_MARK']?>/<?=$item['UF_TRANSPORT_CODE']?>">
            <div class="cart__top">
                <div class="cart__inner">
                    <ul class="cart__list">
                        <li class="cart__box">
                            <img class="cart__img" src="<?=CFile::GetPath($item['UF_TRANSPORT_IMAGES'][0])?>" alt="">
                        </li>
                    </ul>

                    <div class="cart__pagination"></div>
                </div>
            </div>
            <div class="cart__line"></div>
        </a>

            <div class="cart__bottom">
                <div class="cart__wrapper">
                    <div class="cart__left">
                        <div class="cart__subtitle">
                            <a href="/<?=LANGUAGE_ID?>/transport/<?=$item['UF_TRANSPORT_MARK']?>/<?=$item['UF_TRANSPORT_CODE']?>"><?=$item['UF_TRANSPORT_NAME']?></a>
                        </div>

                        <div class="cart__cost">
                            <?=number_format($item['UF_TRANSPORT_PRICE'], 0, '', ' ')?>
                        </div>
                    </div>

                    <div class="cart__right">
                        <div class="cart__location">
                            <img class="cart__location-img" src="<?=SITE_TEMPLATE_PATH?>/images/location.svg" alt=" <?=$item['UF_TRANSPORT_ADDRESS']?>">
                            <?=$item['UF_TRANSPORT_ADDRESS']?>
                        </div>

                        <div class="cart__date">
                            <?=CIBlockFormatProperties::DateFormat('j F Y', MakeTimeStamp($item['UF_TRANSPORT_CREATED_DATE'], CSite::GetDateFormat()))?>
                        </div>
                    </div>
                </div>


                <div class="cart__info">
                    <div class="cart__text">
                        <?=$item['UF_TRANSPORT_DESC']?>
                    </div>

                    <a class="cart__message btn-blue" href="#">
                        <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                        Написать
                    </a>

                    <a class="cart__favorite" data-item="<?= $item['ID'] ?>" data-razdel="1">
                        <img class="cart__favorite-img" src="<?=SITE_TEMPLATE_PATH?>/images/favorite.svg" alt="добавить в избранное">
                        <img class="cart__favorite-img cart__favorite-img--active" src="<?=SITE_TEMPLATE_PATH?>/images/favorite-fill.svg  "
                             alt="добавить в избранное">
                    </a>
                </div>
            </div>

            <div class="cart__author">
                <div class="cart__name">
                    Александр Соколов
                </div>

                <div class="cart__reg-date">
                    На Stendū с 12 ноября 2021
                </div>

                <div class="cart__tel">
                    <img class="cart__tel-img" src="<?=SITE_TEMPLATE_PATH?>/images/phone.svg" alt="Позвонить">

                    <div class="cart__tel-wrapper">
                        <a class="cart__tel-show" href="#">
                            Показать телефон
                        </a>

                        <a class="cart__num" href="#">
                            +371 ··· ··· ·· ··
                        </a>
                    </div>
                </div>

                <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                    Написать
                </a>
            </div>
        </li>
    <?php endforeach;?>


