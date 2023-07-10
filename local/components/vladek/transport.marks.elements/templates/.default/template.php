<?

$items = $arResult['ITEMS'];


?>

<?php foreach ($items as $item):

    ?>
    <li class="announcements__item cart">
    <div class="cart__top">
        <div class="cart__inner">
            <ul class="cart__list">
                 <li class="cart__box">
                     <a href="/transport/<?=$item['UF_TRANSPORT_MARK']?>/<?=$item['UF_TRANSPORT_CODE']?>"> <img class="cart__img" src="<?=CFile::GetPath($item['UF_TRANSPORT_IMAGES'][0])?>" alt=""></a>
                 </li>
            </ul>

            <div class="cart__pagination"></div>
        </div>
    </div>

    <div class="cart__line"></div>

    <div class="cart__bottom">
        <div class="cart__wrapper">
            <div class="cart__left">
                <div class="cart__subtitle">
                    <a href="/transport/<?=$item['UF_TRANSPORT_MARK']?>/<?=$item['UF_TRANSPORT_CODE']?>"><?=$item['UF_TRANSPORT_NAME']?></a>
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

            <a class="cart__favorite" href="#">
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

