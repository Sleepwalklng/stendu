
<?php
$arUslugi = $arResult['WORK'];
$arCount = $arResult['TYPE_WORK']
?>
<ul class="announcements__items">
    <?foreach($arUslugi as $arUsl):?>
        <?foreach($arCount as $type):?>
            <?if($arUsl['UF_TYPE_WORK'] == $type['ID']):
                $url = $type['UF_SESSION_CODE'];
            endif;?>
        <?endforeach?>

        <? if(!empty($arUsl['UF_NAME'])): ?>
            <li class="announcements__item cart" >

                <div class="cart__top">
                    <div class="cart__inner ">
                        <a href="<?= $url;?>/<?= $arUsl['UF_SESSION_CODE'];?>">
                            <ul class="cart__list swiper-wrapper">
                                <li class="cart__box swiper-slide">
                                <?foreach($arUsl['UF_PHOTO'] as $arPhoto):?>
                                <?$imgWork = CFile::GetPath($arPhoto);?>
                                        <li class="cart__box swiper-slide" >
                                            <img class="cart__img" src="<?=$imgWork;?>" alt="">
                                        </li>
                                <?endforeach;?>
                            </ul>
                        </a>
                    </div>
                </div>

                <div class="cart__line"></div>

                <div class="cart__bottom">
                    <div class="cart__wrapper">
                        <a href="<?= $url;?>/<?= $arUsl['UF_SESSION_CODE'];?>">
                            <div class="cart__left">
                                <div class="cart__subtitle" >
                                    <?= $arUsl['UF_NAME']?>
                                </div>

                                <div class="cart__cost">
                                    <?= $arUsl['UF_PRICE']?>
                                </div>
                            </div>
                        </a>

                        <div class="cart__right">
                            <div class="cart__location">
                                <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                                <?= $arUsl['UF_ADRES']?>
                            </div>

                            <div class="cart__date">
                                <?= $arUsl['UF_DATA']?>
                            </div>
                        </div>
                    </div>


                    <div class="cart__info">
                        <div class="cart__text">
                            <?= $arUsl['UF_COMMENT']?>
                        </div>

                        <a class="cart__message btn-blue" href="#">
                            <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                            Написать
                        </a>

                        <a class="cart__favorite" href="#">
                            <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                            <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
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
                        <img class="cart__tel-img" src="<?= SITE_TEMPLATE_PATH ?>/images/phone.svg" alt="Позвонить">

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
                        <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                        Написать
                    </a>
                </div>
            </li>
        <?endif;?>
    <?endforeach;?>
</ul>